<?php

namespace app\Repository\Disposisi;

use App\Models\Disposisi;
use App\Models\Pengajuan;
use App\Repository\Disposisi\DisposisiRepository;
use Illuminate\Support\Facades\Auth;

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
            $paginatedData = $this->disposisi->whereNot(function ($query) {
                $query->where('status_disposisi', '0');
            })->where('tujuan_disposisi', Auth::user()->jabatan)->paginate(6);
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

    public function store($data)
    {
        $tujuanDisposisi = is_array($data->tujuan_disposisi) ? $data->tujuan_disposisi : [$data->tujuan_disposisi];
        $personalDisposisi = is_array($data->id_penerima) ? $data->id_penerima : [$data->id_penerima];

        if ($data->has('tujuan_disposisi')) {
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
        } elseif ($data->has('id_penerima')) {
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
        $tujuanDisposisi = is_array($data->tujuan_disposisi) ? $data->tujuan_disposisi : [$data->tujuan_disposisi];

        foreach ($tujuanDisposisi as $jabatan) {
            $this->disposisi->where('id_disposisi', $id)->update([
                'id_pengajuan' => $data->id_pengajuan,
                'catatan_disposisi' => $data->catatan_disposisi,
                'status_disposisi' => $data->status_disposisi,
                'sifat_disposisi' => $data->sifat_disposisi,
                'id_user' => $data->id_user,
                'tujuan_disposisi' => $jabatan,
                'tanggal_disposisi' => $data->tanggal_disposisi,
                'id_posisi_jabatan' => $data->id_posisi_jabatan,
                'id_penerima' => $data->id_penerima,
            ]);
        }
    }
    public function destroy($id)
    {
        $this->disposisi->where('id_disposisi', $id)->delete();
    }
    public function filterData($data)
    {
        $query = $this->disposisi->query();

        if (isset($data->id_user) && ($data->id_user != null)) {
            $query->where('id_user', $data->id_user);
        }
        if (isset($data->tujuan_disposisi) && ($data->tujuan_disposisi != null)) {
            $query->where('tujuan_disposisi', $data->tujuan_disposisi);
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
    public function search($data, $status)
    {
        $search = $this->disposisi->where('nomor_agenda', 'like', "%" . $data->search . "%")
            ->orWhere(function ($query) use ($data, $status) {
                $query->where('tanggal_terima', 'like', "%" . $data->search . "%")
                    ->orWhereRaw("DATE_FORMAT(tanggal_terima, '%M') LIKE ?", ["%" . $data->search . "%"]);
            })
            ->orWhereHas('surat', function ($query) use ($data, $status) {
                $query->where('nomor_surat', 'like', "%" . $data->search . "%");
            })
            ->orWhereHas('klasifikasi', function ($query) use ($data, $status) {
                $query->where('nomor_klasifikasi', 'like', "%" . $data->search . "%");
            });
        // ->orWhereHas('user', function ($query) use ($data) {
        //     $query->where('nama', 'like', "%" . $data->search . "%");
        // })
        // ->orWhere('isi_surat', 'like', "%" . $data->search . "%");
        return $search->paginate(6);
    }
}
