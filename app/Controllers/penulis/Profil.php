<?php

namespace App\Controllers\Admin;

use App\Models\ProfilModel;
use App\Models\SliderModel;

class Profil extends BaseController
{
    public function edit()
    {
        if (!session()->get('logged_in')) {
            log_message('error', 'Akses ditolak: pengguna belum login.');
            return redirect()->to(base_url('login'));
        }

        $model = new ProfilModel();
        $slider = new SliderModel();
        $username_pengguna = session()->get('username');
        $data['profil_pengguna'] = $model->where('username', $username_pengguna)->first();
        $data['validation'] = \Config\Services::validation();

        log_message('info', "Mengakses halaman edit profil untuk username: {$username_pengguna}");

        return view('penulis/profil/edit', $data);
    }

    public function proses_edit()
    {

        $profilModel = new ProfilModel();
        $sliderModel = new SliderModel();
        $username_pengguna = session()->get('username');
        $profil = $profilModel->where('username', $username_pengguna)->first();
    }
}
