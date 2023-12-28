<?php

namespace App\Repository\Instansi;

use App\Models\Instansi;
use App\Repository\Instansi\InstansiRepository;
use Intervention\Image\Facades\Image;

class InstansiImplement implements InstansiRepository
{
    private $instansi;
    public function __construct(Instansi $instansi)
    {
        $this->instansi = $instansi;
    }
    public function index()
    {
        return $this->instansi->paginate(8);
    }
    public function store($data)
    {
        if ($data->hasFile('foto_instansi')) {
            $image = $data->foto_instansi;
            $nama_foto = time() . '.' . $image->extension();
            $destinationPath = public_path('/image_save');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(1200, 1200, function ($constraint) {
                $constraint->upsize();
            })->save($destinationPath . '/' . $nama_foto);
            $data->foto_instansi->move(public_path('image_save'), $nama_foto);
            $this->instansi->create([
                'nama_instansi' => $data->nama_instansi,
                'alamat_instansi' => $data->alamat_instansi,
                'nomor_telpon' => $data->nomor_telpon,
                'email' => $data->email,
                'foto_instansi' => $nama_foto,
            ]);
        } else {
            $this->instansi->create([
                'nama_instansi' => $data->nama_instansi,
                'alamat_instansi' => $data->alamat_instansi,
                'nomor_telpon' => $data->nomor_telpon,
                'email' => $data->email,
            ]);
        }
    }
    public function show(string $id)
    {
        $this->instansi->where('id_instansi', $id)->first();
    }
    public function edit(string $id)
    {
        $this->instansi->where('id_instansi', $id)->first();
    }
    public function update($data, string $id)
    {
        if ($data->hasFile('foto_instansi')) {
            $instansi = $this->instansi->where('id_instansi', $id)->first();
            if ($instansi->foto_instansi != null) {
                $fotoPath = public_path('image_save/') . $instansi->foto_instansi;
                if (file_exists($fotoPath)) {
                    unlink($fotoPath);
                }
            }
            $image = $data->foto_instansi;
            $nama_foto = time() . '.' . $image->extension();
            $destinationPath = public_path('/image_save');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->fit(1200, 1200, function ($constraint) {
                $constraint->upsize();
            })->save($destinationPath . '/' . $nama_foto);
            $this->instansi->where('id_instansi', $id)->update([
                'nama_instansi' => $data->nama_instansi,
                'alamat_instansi' => $data->alamat_instansi,
                'nomor_telpon' => $data->nomor_telpon,
                'email' => $data->email,
                'foto_instansi' => $nama_foto
            ]);
        } else {
            $this->instansi->where('id_instansi', $id)->update([
                'nama_instansi' => $data->nama_instansi,
                'alamat_instansi' => $data->alamat_instansi,
                'nomor_telpon' => $data->nomor_telpon,
                'email' => $data->email,
            ]);
        }
    }
    public function destroy(string $id)
    {
        $this->instansi->where('id_instansi', $id)->delete();
    }

    public function search($data)
    {
        $search = $this->instansi->where('nama_instansi', 'like', "%" . $data->search . "%")
            ->orWhere('alamat_instansi', 'like', "%" . $data->search . "%")
            ->orWhere('nomor_telpon', 'like', "%" . $data->search . "%");

        return $search->paginate(6);
    }
}
