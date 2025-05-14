<?php

namespace App\Controllers\penulis;

use App\Controllers\BaseController;
use App\Models\BeritaModel;

use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    public function index()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Ubah 'login' sesuai dengan halaman login kamu
        }
        $artikelModel = new BeritaModel();

        $data['artikelCount'] = $artikelModel->countAll();


        return view('penulis/dashboard/index', $data);
    }
}
