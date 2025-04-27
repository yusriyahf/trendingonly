<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\KategoriModel;

class Artikel extends BaseController
{
    protected $artikelModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
        $this->kategoriModel = new KategoriModel();
    }

    public function kategori($kategoriSlug)
    {
        $kategori = $this->kategoriModel->getBySlug($kategoriSlug);
        if (!$kategori) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Kategori tidak ditemukan');
        }

        $artikels = $this->artikelModel->getByKategori($kategori['id_kategori']);

        $data = [
            'kategori' => $kategori,
            'artikels' => $artikels,
        ];

        return view('artikel/kategori', $data);
    }

    public function detail($kategoriSlug, $artikelSlug)
    {
        $kategori = $this->kategoriModel->getBySlug($kategoriSlug);
        if (!$kategori) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Kategori tidak ditemukan');
        }

        $artikel = $this->artikelModel->getDetailArtikel($artikelSlug, $kategori['id_kategori']);
        if (!$artikel) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Artikel tidak ditemukan');
        }

        $data = [
            'kategori' => $kategori,
            'artikel' => $artikel,
        ];

        return view('artikel/detail', $data);
    }
}
