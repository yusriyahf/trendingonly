<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KategoriModel;
use CodeIgniter\HTTP\ResponseInterface;

class KategoriArtikel extends BaseController
{
    public function generateSlug($string)
    {
        $slug = strtolower($string);
        $slug = preg_replace('/[^a-z0-9\s]/', '', $slug);
        $slug = preg_replace('/\s+/', '-', $slug);
        return $slug;
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $model = new KategoriModel();
        return view('admin/kategoriArtikel/index', [
            'all_data_artikel_kategori' => $model->findAll(),
            'validation' => \Config\Services::validation()
        ]);
    }

    public function tambah()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        return view('admin/kategoriArtikel/tambah', [
            'validation' => \Config\Services::validation()
        ]);
    }

    public function proses_tambah()
    {
        date_default_timezone_set('Asia/Jakarta');

        $data = [
            'name_kategori_id' => $this->request->getPost("name_kategori_id"),
            'name_kategori_en' => $this->request->getPost("name_kategori_en"),
            'meta_title_id' => $this->request->getPost("meta_title_id"),
            'meta_title_en' => $this->request->getPost("meta_title_en"),
            'meta_description_id' => $this->request->getPost("meta_description_id"),
            'meta_description_en' => $this->request->getPost("meta_description_en"),
            'slug_id' => $this->generateSlug($this->request->getPost("name_kategori_id")),
            'slug_en' => $this->generateSlug($this->request->getPost("name_kategori_en")),
        ];

        // Validasi
        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $data['name_kategori_id'])) {
            session()->setFlashdata('error', 'Nama kategori Indonesia hanya boleh berisi huruf dan angka.');
            return redirect()->back()->withInput();
        }

        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $data['name_kategori_en'])) {
            session()->setFlashdata('error', 'Nama kategori Inggris hanya boleh berisi huruf dan angka.');
            return redirect()->back()->withInput();
        }

        $model = new KategoriModel();
        $model->insert($data);

        session()->setFlashdata('success', 'Kategori berhasil ditambahkan');
        return redirect()->to(base_url('admin/kategoriArtikel'));
    }

    public function edit($id_kategori)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $model = new KategoriModel();
        $kategori = $model->find($id_kategori);

        if (!$kategori) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Kategori tidak ditemukan');
        }

        return view('admin/kategoriArtikel/edit', [
            'all_data_artikel_kategori' => $kategori,
            'validation' => \Config\Services::validation()
        ]);
    }

    public function proses_edit($id_kategori = null)
    {
        if (!$id_kategori) {
            return redirect()->back();
        }

        date_default_timezone_set('Asia/Jakarta');

        $data = [
            'name_kategori_id' => $this->request->getPost("name_kategori_id"),
            'name_kategori_en' => $this->request->getPost("name_kategori_en"),
            'meta_title_id' => $this->request->getPost("meta_title_id"),
            'meta_title_en' => $this->request->getPost("meta_title_en"),
            'meta_description_id' => $this->request->getPost("meta_description_id"),
            'meta_description_en' => $this->request->getPost("meta_description_en"),
            'slug_id' => $this->generateSlug($this->request->getPost("name_kategori_id")),
            'slug_en' => $this->generateSlug($this->request->getPost("name_kategori_en")),
        ];

        // Validasi
        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $data['name_kategori_id'])) {
            session()->setFlashdata('error', 'Nama kategori Indonesia hanya boleh berisi huruf dan angka.');
            return redirect()->back()->withInput();
        }

        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $data['name_kategori_en'])) {
            session()->setFlashdata('error', 'Nama kategori Inggris hanya boleh berisi huruf dan angka.');
            return redirect()->back()->withInput();
        }

        $model = new KategoriModel();
        $model->update($id_kategori, $data);

        session()->setFlashdata('success', 'Kategori berhasil diperbarui');
        return redirect()->to(base_url('admin/kategoriArtikel'));
    }

    public function delete($id_kategori = false)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $model = new KategoriModel();
        $model->delete($id_kategori);

        return redirect()->to(base_url('admin/kategoriArtikel'));
    }
}
