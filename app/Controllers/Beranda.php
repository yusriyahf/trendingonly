<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\KategoriModel;
use CodeIgniter\Controller;

class Beranda extends BaseController
{
    protected $artikelModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $kategoris = $this->kategoriModel->findAll();
        $kategoriArtikel = [];

        foreach ($kategoris as $kategori) {
            $artikel = $this->artikelModel->getLatestByKategori($kategori['id_kategori'], 3);
            $kategoriArtikel[] = [
                'kategori' => $kategori,
                'artikels' => $artikel
            ];
        }

        $data = [
            'kategoriArtikel' => $kategoriArtikel
        ];

        return view('beranda', $data);
    }
}
