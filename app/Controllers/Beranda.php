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

        // Inisialisasi variabel
        $data = [
            'lang' => $lang,
            'kategoriArtikel' => [],
            'allKategoris' => [],
            'latestArticles' => $this->getLatestArticles(3),
            'popularArticles' => $this->getPopularArticles(4)
        ];

        // Proses data kategori
        $kategoris = $this->kategoriModel->findAll();
        foreach ($kategoris as $kategori) {
            $count = $this->artikelModel->where('id_kategori', $kategori['id_kategori'])->countAllResults();
            $data['allKategoris'][] = [
                'kategori' => $kategori,
                'count' => $count
            ];

            $limit = (strtolower($kategori['nama_kategori_id']) === 'olahraga') ? 6 : 3;
            $artikel = $this->artikelModel->getLatestByKategori($kategori['id_kategori'], $limit);

            $data['kategoriArtikel'][] = [
                'kategori' => $kategori,
                'artikels' => $artikel
            ];
        }

        return view('beranda', $data);
    }

    /**
     * Mendapatkan artikel terbaru
     */
    protected function getLatestArticles($limit = 3)
    {
        $articles = $this->artikelModel
            ->where('published_at <=', date('Y-m-d H:i:s'))
            ->orderBy('published_at', 'DESC')
            ->findAll($limit);

        // Jika artikel kurang dari limit, tambahkan artikel sebelumnya
        if (count($articles) < $limit) {
            $lastDate = !empty($articles) ?
                $articles[count($articles) - 1]['published_at'] :
                date('Y-m-d H:i:s');

            $additionalNeeded = $limit - count($articles);
            $olderArticles = $this->artikelModel
                ->where('published_at <=', date('Y-m-d H:i:s'))
                ->where('published_at <', $lastDate)
                ->orderBy('published_at', 'DESC')
                ->findAll($additionalNeeded);

            $articles = array_merge($articles, $olderArticles);
        }

        // Tambahkan info kategori
        return $this->addCategoryInfo($articles);
    }

    /**
     * Mendapatkan artikel populer
     */
    protected function getPopularArticles($limit = 4)
    {
        $popularArticles = $this->artikelModel
            ->where('published_at <=', date('Y-m-d H:i:s'))
            ->orderBy('views', 'DESC')
            ->orderBy('published_at', 'DESC')
            ->findAll($limit);

        // Jika artikel populer kurang dari limit, tambahkan artikel terbaru
        if (count($popularArticles) < $limit) {
            $additionalNeeded = $limit - count($popularArticles);

            // Hindari duplikat artikel
            $excludeIds = array_column($popularArticles, 'id_artikel');
            $latestArticles = $this->artikelModel
                ->where('published_at <=', date('Y-m-d H:i:s'))
                ->whereNotIn('id_artikel', $excludeIds ?: [0])
                ->orderBy('published_at', 'DESC')
                ->findAll($additionalNeeded);

            $popularArticles = array_merge($popularArticles, $latestArticles);
        }

        // Tambahkan info kategori
        return $this->addCategoryInfo($popularArticles);
    }

    /**
     * Menambahkan informasi kategori ke artikel
     */
    protected function addCategoryInfo(array $articles)
    {
        foreach ($articles as &$article) {
            if (!isset($article['kategori'])) {
                $article['kategori'] = $this->kategoriModel->find($article['id_kategori']);
            }
        }
        return $articles;
    }
}
