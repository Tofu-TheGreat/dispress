<?php

namespace App\Exports;

use App\Models\PosisiJabatan;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class UserTemplate implements WithColumnFormatting, FromCollection, WithHeadings, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function columnFormats(): array
    {
        //Mengganti format untuk kolum B kebawah menjadi format:text
        return [
            'A:A' => NumberFormat::FORMAT_TEXT,
            'G:G' => NumberFormat::FORMAT_TEXT,
        ];
    }
    protected  $users;
    protected  $selects;
    protected  $row_count;
    protected  $column_count;
    public function __construct()
    {
        $level = ['admin', 'officer', 'staff'];
        $jk = ['L', 'P'];
        $roles = PosisiJabatan::pluck('nama_posisi_jabatan')->toArray();
        $selects = [  //selects should have column_name and options
            ['jabatan' => 'G', 'options' => $roles],
            ['jabatan' => 'C', 'options' => $level],
            ['jabatan' => 'F', 'options' => $jk],
        ];
        $this->selects = $selects;
        $this->row_count = 1000; //number of rows that will have the dropdown
        $this->column_count = 5; //number of columns to be auto sized
    }
    public function collection()
    {
        return collect(); // Return an empty collection
    }
    public function headings(): array
    {
        return [
            "nip",
            "nama",
            "level",
            "pangkat",
            "golongan",
            "jenis_kelamin",
            "id_posisi_jabatan",
            "username",
            'email',
            'nomor_telpon',
            'password',
        ];
    }
    public function registerEvents(): array
    {
        return [
            // handle by a closure.
            AfterSheet::class => function (AfterSheet $event) {
                $row_count = $this->row_count;
                $column_count = $this->column_count;
                foreach ($this->selects as $select) {
                    $drop_column = $select['jabatan'];
                    $options = $select['options'];
                    // set dropdown list for first data row
                    $validation = $event->sheet->getCell("{$drop_column}2")->getDataValidation();
                    $validation->setType(DataValidation::TYPE_LIST);
                    $validation->setErrorStyle(DataValidation::STYLE_INFORMATION);
                    $validation->setAllowBlank(false);
                    $validation->setShowInputMessage(true);
                    $validation->setShowErrorMessage(true);
                    $validation->setShowDropDown(true);
                    $validation->setErrorTitle('Input error');
                    $validation->setError('Value is not in list.');
                    $validation->setPromptTitle('Pick from list');
                    $validation->setPrompt('Please pick a value from the drop-down list.');
                    $validation->setFormula1(sprintf('"%s"', implode(',', $options)));

                    // clone validation to remaining rows
                    for ($i = 3; $i <= $row_count; $i++) {
                        $event->sheet->getCell("{$drop_column}{$i}")->setDataValidation(clone $validation);
                    }
                    // set columns to autosize
                    for ($i = 1; $i <= $column_count; $i++) {
                        $column = Coordinate::stringFromColumnIndex($i);
                        $event->sheet->getColumnDimension($column)->setAutoSize(true);
                    }
                }
            },
        ];
    }
}
