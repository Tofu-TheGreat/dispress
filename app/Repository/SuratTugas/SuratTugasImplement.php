<?php

namespace App\Repository\SuratTugas;

use App\Models\SuratTugas;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\WebSetting;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;

class SuratTugasImplement implements SuratTugasRepository
{
    private $suratTugas;
    public function __construct(SuratTugas $suratTugas)
    {
        $this->suratTugas = $suratTugas;
    }

    public function index()
    {
        return $this->suratTugas->paginate(6);
    }
    public function store($data)
    {
        $idUsersArray = [$data->id_user_penerima];
        $idUsersJson = json_encode($idUsersArray);
        $this->suratTugas->create([
            'id_klasifikasi' => $data['id_klasifikasi'],
            'nomor_surat_tugas' => $data['nomor_surat_tugas'],
            'id_user' => Auth::user()->id_user,
            'dasar' => $data['dasar'],
            'id_user_penerima' => $idUsersJson,
            'tanggal_mulai' => $data['tanggal_mulai'],
            'tanggal_selesai' => $data['tanggal_selesai'],
            'waktu_mulai' => $data['waktu_mulai'],
            'waktu_selesai' => $data['waktu_selesai'],
            'tujuan_pelaksanaan' => $data['tujuan_pelaksanaan'],
            'tempat_pelaksanaan' => $data['tempat_pelaksanaan'],
            'tembusan' => $data['tembusan'],
        ]);
    }

    public function show($id)
    {
        return $this->suratTugas->where('id_surat_tugas', $id)->first();
    }
    public function edit($id)
    {
        return $this->suratTugas->where('id_surat_tugas', $id)->first();
    }
    public function update($id, $data)
    {
        $idUsersArray = [$data->id_user_penerima];
        $idUsersJson = json_encode($idUsersArray);
        $this->suratTugas->where('id_surat_tugas', $id)->update([
            'id_klasifikasi' => $data['id_klasifikasi'],
            'nomor_surat_tugas' => $data['nomor_surat_tugas'],
            'id_user' => Auth::user()->id_user,
            'dasar' => $data['dasar'],
            'id_user_penerima' => $idUsersJson,
            'tanggal_mulai' => $data['tanggal_mulai'],
            'tanggal_selesai' => $data['tanggal_selesai'],
            'waktu_mulai' => $data['waktu_mulai'],
            'waktu_selesai' => $data['waktu_selesai'],
            'tujuan_pelaksanaan' => $data['tujuan_pelaksanaan'],
            'tempat_pelaksanaan' => $data['tempat_pelaksanaan'],
            'tembusan' => $data['tembusan'],
        ]);
    }
    public function destroy($id)
    {
        $this->suratTugas->where('id_surat_tugas', $id)->delete();
    }
    public function cetakSuratTugas($id)
    {
        $encryptId = Crypt::decryptString($id);
        $dataSuratTugas = SuratTugas::where('id_surat_tugas', $encryptId)->first();
        $dataWeb = WebSetting::first();

        $pdf = PDF::loadView(

            ['dataSuratTugas' => $dataSuratTugas, 'dataWeb' => $dataWeb]
        );
        return $pdf;
    }
    public function filterData($data)
    {
        $query = $this->suratTugas->query();

        if (isset($data->id_user) && ($data->id_user != null)) {
            $query->where('id_user', $data->id_user);
        }
        if (isset($data->id_klasifikasi) && ($data->id_klasifikasi != null)) {
            $query->where('id_klasifikasi', $data->id_klasifikasi);
        }
        if (
            isset($data->tanggal_surat_awal) &&
            ($data->tanggal_surat_awal != null) &&
            isset($data->tanggal_surat_terakhir) &&
            ($data->tanggal_surat_terakhir != null)
        ) {
            $query->whereBetween('created_at', [$data->tanggal_surat_awal, $data->tanggal_surat_terakhir]);
        }


        return $query->paginate(6);
    }
    public function search($data)
    {
        $search = $this->suratTugas->where('nomor_surat_tugas', 'like', "%" . $data->search . "%")
            ->orWhere(function ($query) use ($data) {
                $query->where('tanggal_mulai', 'like', "%" . $data->search . "%")
                    ->orWhereRaw("DATE_FORMAT(tanggal_mulai, '%M') LIKE ?", ["%" . $data->search . "%"]);
            })
            ->orWhere(function ($query) use ($data) {
                $query->where('tanggal_selesai', 'like', "%" . $data->search . "%")
                    ->orWhereRaw("DATE_FORMAT(tanggal_selesai, '%M') LIKE ?", ["%" . $data->search . "%"]);
            })
            ->orWhereHas('klasifikasi', function ($query) use ($data) {
                $query->where('nama_klasifikasi', 'like', "%" . $data->search . "%");
            })
            ->orWhereHas('pengirim', function ($query) use ($data) {
                $query->where('nama', 'like', "%" . $data->search . "%");
            })
            ->orWhere('dasar', 'like', "%" . $data->search . "%")
            ->orWhere('tempat_pelaksanaan', 'like', "%" . $data->search . "%")
            ->orWhere('tujuan_pelaksanaan', 'like', "%" . $data->search . "%");
        return $search->paginate(6);
    }
    public function getUserInArray($id)
    {
        if (is_array($id)) {
            $flattenedIdUsersArray = collect($id)->flatten()->all();
        } else {
            $idUsersArray = json_decode($id, true);
            $flattenedIdUsersArray = collect($idUsersArray)->flatten()->all();
        }

        $userGet = User::whereIn('id_user', $flattenedIdUsersArray)->get();

        return $userGet;
    }
}
