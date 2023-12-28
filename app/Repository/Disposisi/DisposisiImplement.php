<?php

namespace app\Repository\Disposisi;

use App\Models\Disposisi;
use App\Models\Pengajuan;
use App\Models\WebSetting;
use App\Repository\Disposisi\DisposisiRepository;
use Illuminate\Support\Facades\Auth;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMERGER;

class DisposisiImplement implements DisposisiRepository
{
    public $disposisi;

    public function __construct(Disposisi $disposisi)
    {
        $this->disposisi = $disposisi;
    }

    public function index()
    {
        if (Auth::check() && Auth::user()->level != 'admin') {
            $paginatedData = $this->disposisi->where('id_posisi_jabatan', Auth::user()->id_posisi_jabatan)->orWhere('id_penerima', Auth::user()->id_user)->paginate(6);
        } else {
            $paginatedData = $this->disposisi->paginate(6);
        }
        $paginatedData->getCollection()->transform(function ($data) {
            $data->sifat_disposisi = convertDisposisiField($data->sifat_disposisi, 'sifat');
            $data->status_disposisi = convertDisposisiField($data->status_disposisi, 'status');
            $data->tujuan_disposisi = convertDisposisiField($data->tujuan_disposisi, 'tujuan');
            return $data;
        });

        return $paginatedData;
    }

    public function indexAdmin()
    {
        if (Auth::check() && Auth::user()->level == 'admin') {
            $paginatedData = $this->disposisi->where('id_penerima', Auth::user()->id_user)->orWhere('id_posisi_jabatan', Auth::user()->id_posisi_jabatan)->paginate(6);
        } else {
            $paginatedData = $this->disposisi->where('id_posisi_jabatan', Auth::user()->id_posisi_jabatan)->orWhere('id_penerima', Auth::user()->id_user)->paginate(6);
        }
        $paginatedData->getCollection()->transform(function ($data) {
            $data->sifat_disposisi = convertDisposisiField($data->sifat_disposisi, 'sifat');
            $data->status_disposisi = convertDisposisiField($data->status_disposisi, 'status');
            $data->tujuan_disposisi = convertDisposisiField($data->tujuan_disposisi, 'tujuan');
            return $data;
        });

        return $paginatedData;
    }

    public function store($data)
    {

        $tujuanDisposisi = is_array($data->id_posisi_jabatan) ? $data->id_posisi_jabatan : [$data->id_posisi_jabatan];
        $personalDisposisi = is_array($data->id_penerima) ? $data->id_penerima : [$data->id_penerima];

        if ($data->id_posisi_jabatan != null) {
            foreach ($tujuanDisposisi as $jabatan) {
                $this->disposisi->create([
                    'id_pengajuan' => $data->id_pengajuan,
                    'catatan_disposisi' => $data->catatan_disposisi,
                    'status_disposisi' => $data->status_disposisi,
                    'sifat_disposisi' => $data->sifat_disposisi,
                    'id_user' => $data->id_user,
                    'tanggal_disposisi' => $data->tanggal_disposisi,
                    'id_posisi_jabatan' => $jabatan,
                ]);
            }
            Pengajuan::where('id_pengajuan', $data->id_pengajuan)->update([
                'status_pengajuan' => '1'
            ]);
        }
        if ($data->id_penerima != null) {
            foreach ($personalDisposisi as $penerima) {
                $this->disposisi->create([
                    'id_pengajuan' => $data->id_pengajuan,
                    'catatan_disposisi' => $data->catatan_disposisi,
                    'status_disposisi' => $data->status_disposisi,
                    'sifat_disposisi' => $data->sifat_disposisi,
                    'id_user' => $data->id_user,
                    'tanggal_disposisi' => $data->tanggal_disposisi,
                    'id_penerima' => $penerima,
                ]);
            }
            Pengajuan::where('id_pengajuan', $data->id_pengajuan)->update([
                'status_pengajuan' => '1'
            ]);
        }
    }
    public function show($id)
    {
        $data = $this->disposisi->where('id_disposisi', $id)->first();

        $data->sifat_disposisi = convertDisposisiField($data->sifat_disposisi, 'sifat');
        $data->status_disposisi = convertDisposisiField($data->status_disposisi, 'status');
        $data->tujuan_disposisi = convertDisposisiField($data->tujuan_disposisi, 'tujuan');

        return $data;
    }

    public function edit($id)
    {
        return $this->disposisi->where('id_disposisi', $id)->first();
    }
    public function update($id, $data)
    {
        $tujuanDisposisi = is_array($data->id_posisi_jabatan) ? $data->id_posisi_jabatan : [$data->id_posisi_jabatan];
        $personalDisposisi = is_array($data->id_penerima) ? $data->id_penerima : [$data->id_penerima];

        if ($data->id_posisi_jabatan != null) {
            $disposisiSlice = array_slice($tujuanDisposisi, 1);
            if ($tujuanDisposisi > 0) {
                foreach ($disposisiSlice as $jabatan) {
                    $this->disposisi->create([
                        'id_pengajuan' => $data->id_pengajuan,
                        'catatan_disposisi' => $data->catatan_disposisi,
                        'status_disposisi' => $data->status_disposisi,
                        'sifat_disposisi' => $data->sifat_disposisi,
                        'id_user' => $data->id_user,
                        'tanggal_disposisi' => $data->tanggal_disposisi,
                        'id_posisi_jabatan' => $jabatan,
                    ]);
                }
            }
        } elseif ($data->id_penerima != null) {
            $penerimaSlice = array_slice($personalDisposisi, 1);
            if ($personalDisposisi > 0) {
                foreach ($penerimaSlice as $penerima) {
                    $this->disposisi->create([
                        'id_pengajuan' => $data->id_pengajuan,
                        'catatan_disposisi' => $data->catatan_disposisi,
                        'status_disposisi' => $data->status_disposisi,
                        'sifat_disposisi' => $data->sifat_disposisi,
                        'id_user' => $data->id_user,
                        'tanggal_disposisi' => $data->tanggal_disposisi,
                        'id_penerima' => $penerima,
                    ]);
                }
            }
        }
        $this->disposisi->where('id_disposisi', $id)->update([
            'id_pengajuan' => $data->id_pengajuan,
            'catatan_disposisi' => $data->catatan_disposisi,
            'status_disposisi' => $data->status_disposisi,
            'sifat_disposisi' => $data->sifat_disposisi,
            'id_user' => $data->id_user,
            'tanggal_disposisi' => $data->tanggal_disposisi,
            'id_posisi_jabatan' => $tujuanDisposisi[0],
            'id_penerima' => $personalDisposisi[0],

        ]);
    }
    public function destroy($id)
    {
        $this->disposisi->where('id_disposisi', $id)->delete();
    }
    public function filterDataAll($data)
    {
        $query = $this->disposisi->query();

        if (isset($data->id_user) && ($data->id_user != null)) {
            $query->where('id_user', $data->id_user);
        }
        if (isset($data->id_posisi_jabatan) && is_array($data->id_posisi_jabatan) && count($data->id_posisi_jabatan) > 0) {
            $query->whereIn('id_posisi_jabatan', $data->id_posisi_jabatan);
        }
        if (isset($data->id_penerima) && is_array($data->id_penerima) && count($data->id_penerima) > 0) {
            $query->whereIn('id_penerima', $data->id_penerima);
        }
        if (isset($data->sifat_disposisi) && ($data->sifat_disposisi != null)) {
            $query->where('sifat_disposisi', $data->sifat_disposisi);
        }
        if (isset($data->status_disposisi) && ($data->status_disposisi != null)) {
            $query->where('status_disposisi', $data->status_disposisi);
        }
        if (
            isset($data->tanggal_surat_awal) &&
            ($data->tanggal_surat_awal != null) &&
            isset($data->tanggal_surat_terakhir) &&
            ($data->tanggal_surat_terakhir != null)
        ) {
            $query->whereBetween('tanggal_disposisi', [$data->tanggal_surat_awal, $data->tanggal_surat_terakhir]);
        }

        $result = $query->paginate(6);


        $result->getCollection()->transform(function ($item) {
            $item->sifat_disposisi = convertDisposisiField($item->sifat_disposisi, 'sifat');
            $item->status_disposisi = convertDisposisiField($item->status_disposisi, 'status');
            $item->tujuan_disposisi = convertDisposisiField($item->tujuan_disposisi, 'tujuan');
            return $item;
        });

        return $result;
    }


    public function filterData($data)
    {
        $query = $this->disposisi->query();

        if (isset($data->id_user) && ($data->id_user != null)) {
            $query->where('id_user', $data->id_user);
        }
        if (isset($data->sifat_disposisi) && ($data->sifat_disposisi != null)) {
            $query->where('sifat_disposisi', $data->sifat_disposisi);
        }
        if (isset($data->status_disposisi) && ($data->status_disposisi != null)) {
            $query->where('status_disposisi', $data->status_disposisi);
        }
        if (
            isset($data->tanggal_surat_awal) &&
            ($data->tanggal_surat_awal != null) &&
            isset($data->tanggal_surat_terakhir) &&
            ($data->tanggal_surat_terakhir != null)
        ) {
            $query->whereBetween('tanggal_disposisi', [$data->tanggal_surat_awal, $data->tanggal_surat_terakhir]);
        }


        $result = $query->where(function ($query) use ($data) {
            $query->where('id_posisi_jabatan', Auth::user()->id_posisi_jabatan)
                ->orWhere('id_penerima', Auth::user()->id_user);
        })->paginate(6);

        $result->getCollection()->transform(function ($item) {
            $item->sifat_disposisi = convertDisposisiField($item->sifat_disposisi, 'sifat');
            $item->status_disposisi = convertDisposisiField($item->status_disposisi, 'status');
            $item->tujuan_disposisi = convertDisposisiField($item->tujuan_disposisi, 'tujuan');
            return $item;
        });

        return $result;
    }


    public function search($data)
    {
        $search = $this->disposisi
            ->where(function ($query) use ($data) {
                $query->where('tanggal_disposisi', 'like', "%" . $data->search . "%")
                    ->orWhereRaw("DATE_FORMAT(tanggal_disposisi, '%M') LIKE ?", ["%" . $data->search . "%"]);
            })
            ->orWhereHas('pengajuan', function ($query) use ($data) {
                $query->where('nomor_agenda', 'like', "%" . $data->search . "%")
                    ->orWhereHas('surat', function ($subquery) use ($data) {
                        $subquery->where('nomor_surat', 'like', "%" . $data->search . "%");
                    });
            })
            ->orWhereHas('posisiJabatan', function ($query) use ($data) {
                $query->where('nama_posisi_jabatan', 'like', "%" . $data->search . "%");
            })
            ->orWhere('catatan_disposisi', 'like', "%" . $data->search . "%");

        $result = $search->paginate(6);
        $result->getCollection()->transform(function ($item) {
            $item->sifat_disposisi = convertDisposisiField($item->sifat_disposisi, 'sifat');
            $item->status_disposisi = convertDisposisiField($item->status_disposisi, 'status');
            $item->tujuan_disposisi = convertDisposisiField($item->tujuan_disposisi, 'tujuan');
            return $item;
        });

        return $result;
    }

    public function searchForUser($data)
    {
        $result = $this->disposisi
            ->where(function ($query) use ($data) {
                $query->where('tanggal_disposisi', 'like', "%" . $data->search . "%")
                    ->orWhereRaw("DATE_FORMAT(tanggal_disposisi, '%M') LIKE ?", ["%" . $data->search . "%"]);
            })
            ->orWhereHas('pengajuan', function ($query) use ($data) {
                $query->where('nomor_agenda', 'like', "%" . $data->search . "%")
                    ->orWhereHas('surat', function ($subquery) use ($data) {
                        $subquery->where('nomor_surat', 'like', "%" . $data->search . "%");
                    });
            })
            ->orWhereHas('posisiJabatan', function ($query) use ($data) {
                $query->where('nama_posisi_jabatan', 'like', "%" . $data->search . "%");
            })
            ->orWhere('catatan_disposisi', 'like', "%" . $data->search . "%")
            ->where(function ($query) use ($data) {
                $query->where(function ($subquery) use ($data) {
                    $subquery->where('id_posisi_jabatan', Auth::user()->id_posisi_jabatan)
                        ->orWhere('id_penerima', Auth::user()->id_user);
                });
            })
            ->paginate(6);

        $result->getCollection()->transform(function ($item) {
            $item->sifat_disposisi = convertDisposisiField($item->sifat_disposisi, 'sifat');
            $item->status_disposisi = convertDisposisiField($item->status_disposisi, 'status');
            $item->tujuan_disposisi = convertDisposisiField($item->tujuan_disposisi, 'tujuan');
            return $item;
        });

        return $result;
    }
    public function cetakDisposisi($id)
    {
        $dataDisposisi = $this->disposisi->where('id_disposisi', $id)->first();

        $dataWeb = WebSetting::first();

        $disposisiByRow = $this->disposisi->where('id_pengajuan', $dataDisposisi->id_pengajuan)->get();
        $mainPdf = PDF::loadView('manajemen-surat.disposisi.disposisi-cetak', ['dataDisposisi' => $dataDisposisi, 'disposisiByRow' => $disposisiByRow, 'dataWeb' => $dataWeb]);


        return $mainPdf;
    }
}
