<?php

namespace App\Repository\WebSetting;

use App\Models\Instansi;
use App\Models\WebSetting;
use Intervention\Image\Facades\Image;

class WebSettingImplement implements WebSettingRepository
{
    private $websetting;

    public function __construct(WebSetting $webSetting)
    {
        $this->websetting = $webSetting;
    }

    public function index()
    {
        return $this->websetting->where('id_web_setting', 1)->get();
    }

    public function store($data)
    {
        if ($data->hasFile('default_logo')) {
            $image = $data->default_logo;
            $nama_foto = time() . '.' . $image->extension();
            $destinationPath = public_path('/image_save');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(1200, 1200, function ($constraint) {
                $constraint->upsize();
            })->save($destinationPath . '/' . $nama_foto);
            $data->default_logo->move(public_path('image_save'), $nama_foto);
            $this->websetting->create([
                'id_instansi' => $data['id_instansi'],
                'id_ketua' => $data['id_ketua'],
                'default_logo' => $nama_foto,
            ]);
        } else {
            $this->websetting->create([
                'id_instansi' => $data['id_instansi'],
                'id_ketua' => $data['id_ketua'],
            ]);
        }
    }

    public function update($data, $id)
    {
        $webSetting = $this->websetting->find($id);

        if (!$webSetting) {
            return null;
        }

        if ($data->hasFile('default_logo')) {
            $web_setting = $this->websetting->where('id_web_setting', $id)->first();
            if ($web_setting->default_logo != null) {
                $fotoPath = public_path('image_save/') . $web_setting->default_logo;
                if (file_exists($fotoPath)) {
                    unlink($fotoPath);
                }
            }
            $image = $data->default_logo;
            $nama_foto = time() . '.' . $image->extension();
            $destinationPath = public_path('/image_save');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->fit(1200, 1200, function ($constraint) {
                $constraint->upsize();
            })->save($destinationPath . '/' . $nama_foto);
            $webSetting->update([
                'id_instansi' => $data['id_instansi'],
                'id_ketua' => $data['id_ketua'],
                'default_logo' => $nama_foto
            ]);
        } else {
            $webSetting->update([
                'id_instansi' => $data['id_instansi'],
                'id_ketua' => $data['id_ketua'],
            ]);
        }

        if ($data->has('email') || $data->has('nomor_telpon') || $data->has('alamat_instansi')) {
            if ($data->hasFile('foto_instansi')) {
                $image_instansi = $data->foto_instansi;
                $nama_foto_instansi = time() . '.' . $image_instansi->extension();
                $destinationPath_instansi = public_path('/image_save');
                $imgFile_instansi = Image::make($image_instansi->getRealPath());
                $imgFile_instansi->resize(1200, 1200, function ($constraint) {
                    $constraint->upsize();
                })->save($destinationPath_instansi . '/' . $nama_foto_instansi);
                $data->foto_instansi->move(public_path('image_save'), $nama_foto_instansi);
                Instansi::where('id_instansi', $data->id_instansi)->update([
                    'email' => $data['email'],
                    'nomor_telpon' =>  currencyPhoneToNumeric($data['nomor_telpon']),
                    'alamat_instansi' => $data['alamat_instansi'],
                    'foto_instansi' => $nama_foto_instansi,
                ]);
            }
            Instansi::where('id_instansi', $data->id_instansi)->update([
                'email' => $data['email'],
                'nomor_telpon' =>  currencyPhoneToNumeric($data['nomor_telpon']),
                'alamat_instansi' => $data['alamat_instansi'],
            ]);
        }
        return $webSetting;
    }
    public function deleteImageWebSetting($id)
    {
        $websetting = $this->websetting->find($id);
        if ($websetting->default_logo != null) {
            $fotoPath = public_path('image_save/') . $websetting->default_logo;
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }
        $websetting->default_logo = null;
        $websetting->save();
    }
}
