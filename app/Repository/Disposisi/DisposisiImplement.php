<?php

namespace app\Repository\Disposisi;

use App\Models\Disposisi;
use App\Repository\Disposisi\DisposisiRepository;

class DisposisiImplement implements DisposisiRepository
{
    public $disposisi;

    public function __construct(Disposisi $disposisi)
    {
        $this->disposisi = $disposisi;
    }

    public function index()
    {
        $paginatedData =  $this->disposisi->paginate(6);
        $paginatedData->getCollection()->transform(function ($data) {
            switch ($data->sifat_disposisi) {
                case 0:
                    $data->sifat_disposisi = 'Biasa';
                    break;
                case 1:
                    $data->sifat_disposisi = 'Prioritas';
                    break;
                case 2:
                    $data->sifat_disposisi = 'Rahasia';
                    break;
                default:
                    $data->sifat_disposisi = 'Tidak Diketahui';
            }

            switch ($data->status_disposisi) {
                case 0:
                    $data->status_disposisi = 'Belum ditindak';
                    break;
                case 1:
                    $data->status_disposisi = 'Diajukan';
                    break;
                case 2:
                    $data->status_disposisi = 'Diterima';
                    break;
                case 3:
                    $data->status_disposisi = 'Dikembalikan';
                    break;
                default:
                    $data->status_disposisi = 'Tidak Diketahui';
            }

            switch ($data->tujuan_disposisi) {
                case 0:
                    $data->tujuan_disposisi = 'Kepala Sekolah';
                    break;
                case 1:
                    $data->tujuan_disposisi = 'Wakil Kepala Sekolah';
                    break;
                case 2:
                    $data->tujuan_disposisi = 'Kurikulum';
                    break;
                case 3:
                    $data->tujuan_disposisi = 'Kesiswaan';
                    break;
                case 4:
                    $data->tujuan_disposisi = 'Sarana dan Prasarana';
                    break;
                case 5:
                    $data->tujuan_disposisi = 'Kepala Jurusan';
                    break;
                case 6:
                    $data->tujuan_disposisi = 'Hubin';
                    break;
                case 7:
                    $data->tujuan_disposisi = 'Bimbingan Konseling';
                    break;
                case 8:
                    $data->tujuan_disposisi = 'Guru Umum';
                    break;
                case 9:
                    $data->tujuan_disposisi = 'Tata Usaha';
                    break;
                default:
                    $data->tujuan_disposisi = 'Tidak Diketahui';
            }
            return $data;
        });
        return $paginatedData;
    }

    public function store($data)
    {
        $this->disposisi->create([
            'id_surat' => $data->id_surat,
            'tanggal_disposisi' => $data->tanggal_disposisi,
            'catatan_disposisi' => $data->catatan_disposisi,
            'status_disposisi' => $data->status_disposisi,
            'sifat_disposisi' => $data->sifat_diposisi,
            'id_user' => $data->id_user,
            'tujuan_disposisi' => $data->tujuan_diposisi,
        ]);
    }
    public function show($id)
    {
        $data = $this->disposisi->where('id_disposisi', $id)->first();

        switch ($data->sifat_disposisi) {
            case 0:
                $data->sifat_disposisi = 'Biasa';
                break;
            case 1:
                $data->sifat_disposisi = 'Prioritas';
                break;
            case 2:
                $data->sifat_disposisi = 'Rahasia';
                break;
            default:
                $data->sifat_disposisi = 'Tidak Diketahui';
        }

        switch ($data->status_disposisi) {
            case 0:
                $data->status_disposisi = 'Belum ditindak';
                break;
            case 1:
                $data->status_disposisi = 'Diajukan';
                break;
            case 2:
                $data->status_disposisi = 'Diterima';
                break;
            case 3:
                $data->status_disposisi = 'Dikembalikan';
                break;
            default:
                $data->status_disposisi = 'Tidak Diketahui';
        }

        switch ($data->tujuan_disposisi) {
            case 0:
                $data->tujuan_disposisi = 'Kepala Sekolah';
                break;
            case 1:
                $data->tujuan_disposisi = 'Wakil Kepala Sekolah';
                break;
            case 2:
                $data->tujuan_disposisi = 'Kurikulum';
                break;
            case 3:
                $data->tujuan_disposisi = 'Kesiswaan';
                break;
            case 4:
                $data->tujuan_disposisi = 'Sarana dan Prasarana';
                break;
            case 5:
                $data->tujuan_disposisi = 'Kepala Jurusan';
                break;
            case 6:
                $data->tujuan_disposisi = 'Hubin';
                break;
            case 7:
                $data->tujuan_disposisi = 'Bimbingan Konseling';
                break;
            case 8:
                $data->tujuan_disposisi = 'Guru Umum';
                break;
            case 9:
                $data->tujuan_disposisi = 'Tata Usaha';
                break;
            default:
                $data->tujuan_disposisi = 'Tidak Diketahui';
        }

        return $data;
    }

    public function edit($id)
    {
        return $this->disposisi->where('id_disposisi', $id)->first();
    }
    public function update($id, $data)
    {
        $this->disposisi->where('id_disposisi', $id)->update([
            'id_surat' => $data->id_surat,
            'tanggal_disposisi' => $data->tanggal_disposisi,
            'catatan_disposisi' => $data->catatan_disposisi,
            'status_disposisi' => $data->status_disposisi,
            'sifat_disposisi' => $data->sifat_disposisi,
            'id_user' => $data->id_user,
            'tujuan_disposisi' => $data->tujuan_disposisi,
        ]);
    }
    public function destroy($id)
    {
        $this->disposisi->where('id_disposisi', $id)->delete();
    }
}
