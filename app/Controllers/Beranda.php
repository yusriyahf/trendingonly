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
        $lang = session()->get('lang') ?? 'id';
        $kategoris = $this->kategoriModel->findAll();
        $kategoriArtikel = [];
        $kategoriWithCount = [];

        // Get latest articles (3 most recent published articles)
        $latestArticles = $this->artikelModel
            ->where('published_at <=', date('Y-m-d H:i:s'))
            ->orderBy('published_at', 'DESC')
            ->findAll(3);

        // Get popular articles (4 most viewed articles)
        $popularArticles = $this->artikelModel
            ->where('published_at <=', date('Y-m-d H:i:s'))
            ->orderBy('views', 'DESC')
            ->orderBy('published_at', 'DESC')
            ->findAll(4);

        // Add category info to each article
        foreach ($latestArticles as &$article) {
            $article['kategori'] = $this->kategoriModel->find($article['id_kategori']);
        }

        // Add category info to popular articles
        foreach ($popularArticles as &$article) {
            $article['kategori'] = $this->kategoriModel->find($article['id_kategori']);
        }
        $kategoriWithCount = [];

        // Jika artikel terbaru kurang dari 3, tambahkan artikel sebelumnya
        if (count($latestArticles) < 3) {
            $lastDate = !empty($latestArticles) ?
                $latestArticles[count($latestArticles) - 1]['published_at'] :
                date('Y-m-d H:i:s');

            $additionalNeeded = 3 - count($latestArticles);
            $olderArticles = $this->artikelModel
                ->where('published_at <=', date('Y-m-d H:i:s'))
                ->where('published_at <', $lastDate)
                ->orderBy('published_at', 'DESC')
                ->findAll($additionalNeeded);

            $latestArticles = array_merge($latestArticles, $olderArticles);
        }


        foreach ($kategoris as $kategori) {
            $count = $this->artikelModel->where('id_kategori', $kategori['id_kategori'])->countAllResults();
            $kategoriWithCount[] = [
                'kategori' => $kategori,
                'count' => $count
            ];

            $limit = (strtolower($kategori['nama_kategori_id']) === 'olahraga') ? 6 : 3;
            $artikel = $this->artikelModel->getLatestByKategori($kategori['id_kategori'], $limit);

            $kategoriArtikel[] = [
                'kategori' => $kategori,
                'artikels' => $artikel
            ];
        }

        $data = [
            'lang' => $lang,
            'kategoriArtikel' => $kategoriArtikel,
            'allKategoris' => $kategoriWithCount,
            'latestArticles' => $latestArticles,
            'popularArticles' => $popularArticles // Tambahkan popular articles ke data yang dikirim ke view
        ];

        return view('beranda', $data);
    }
}
