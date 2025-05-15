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
        $lang = session()->get('lang') ?? 'id';
        $categories = $this->kategoriModel->get_categories_with_thumbnails();


        $kategoris = $this->kategoriModel->findAll();
        $kategori = $this->kategoriModel->getBySlug($kategoriSlug);
        if (!$kategori) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Kategori tidak ditemukan');
        }

        $artikels = $this->artikelModel->getByKategori($kategori['id_kategori']);

        $kategoriWithCount = [];
        foreach ($kategoris as $kg) {
            $count = $this->artikelModel->where('id_kategori', $kg['id_kategori'])->countAllResults();
            $kategoriWithCount[] = [
                'kategori' => $kg,
                'count' => $count
            ];


            // $artikel = $this->artikelModel->getLatestByKategori($kategori['id_kategori'], 3);
            // $kategoriArtikel[] = [
            //     'kategori' => $kategori,
            //     'artikels' => $artikel
            // ];
        }

        $kategoriWithCount = [];
        foreach ($kategoris as $kg) {
            $count = $this->artikelModel->where('id_kategori', $kg['id_kategori'])->countAllResults();
            $kategoriWithCount[] = [
                'kategori' => $kg,
                'count' => $count
            ];


            // $artikel = $this->artikelModel->getLatestByKategori($kategori['id_kategori'], 3);
            // $kategoriArtikel[] = [
            //     'kategori' => $kategori,
            //     'artikels' => $artikel
            // ];
        }

        $meta = $this->kategoriModel->getMetaOnly($kategoriSlug);

        // dd($meta);
        $data = [
            'lang' => $lang,
            'meta' => $meta,
            'kategori' => $kategori,
            'artikels' => $artikels,
            'categories' => $categories,
            'allKategoris' => $kategoriWithCount
        ];

        return view('artikel/kategori', $data);
    }

    public function detail($kategoriSlug, $artikelSlug)
    {
        $lang = session()->get('lang') ?? 'id';

        $kategoris = $this->kategoriModel->findAll();
        $kategori = $this->kategoriModel->getBySlug($kategoriSlug);
        if (!$kategori) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Kategori tidak ditemukan');
        }

        $artikel = $this->artikelModel->getDetailArtikel($artikelSlug, $kategori['id_kategori']);
        if (!$artikel) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Artikel tidak ditemukan');
        }

        $kategoriWithCount = [];
        foreach ($kategoris as $kg) {
            $count = $this->artikelModel->where('id_kategori', $kg['id_kategori'])->countAllResults();
            $kategoriWithCount[] = [
                'kategori' => $kg,
                'count' => $count
            ];
        }

        $popularArticles = $this->artikelModel
            ->where('published_at <=', date('Y-m-d H:i:s'))
            ->orderBy('views', 'DESC')
            ->orderBy('published_at', 'DESC')
            ->findAll(4);

        foreach ($popularArticles as &$article) {
            $article['kategori'] = $this->kategoriModel->find($article['id_kategori']);
        }


        $kategoriWithCount = [];
        foreach ($kategoris as $kg) {
            $count = $this->artikelModel->where('id_kategori', $kg['id_kategori'])->countAllResults();
            $kategoriWithCount[] = [
                'kategori' => $kg,
                'count' => $count
            ];
        }

        $popularArticles = $this->artikelModel
            ->where('published_at <=', date('Y-m-d H:i:s'))
            ->orderBy('views', 'DESC')
            ->orderBy('published_at', 'DESC')
            ->findAll(4);

        foreach ($popularArticles as &$article) {
            $article['kategori'] = $this->kategoriModel->find($article['id_kategori']);
        }

        $meta = $this->artikelModel->getMetaOnly($artikelSlug, $kategori['id_kategori']);


        $kategoriWithCount = [];
        foreach ($kategoris as $kg) {
            $count = $this->artikelModel->where('id_kategori', $kg['id_kategori'])->countAllResults();
            $kategoriWithCount[] = [
                'kategori' => $kg,
                'count' => $count
            ];
        }

        $popularArticles = $this->artikelModel
            ->where('published_at <=', date('Y-m-d H:i:s'))
            ->orderBy('views', 'DESC')
            ->orderBy('published_at', 'DESC')
            ->findAll(4);

        foreach ($popularArticles as &$article) {
            $article['kategori'] = $this->kategoriModel->find($article['id_kategori']);
        }

        $meta = $this->artikelModel->getMetaOnly($artikelSlug, $kategori['id_kategori']);

        $data = [
            'lang' => $lang,
            'meta' => $meta,
            'kategori' => $kategori,
            'artikel' => $artikel,
            'allKategoris' => $kategoriWithCount,
            'popularArticles' => $popularArticles
            'allKategoris' => $kategoriWithCount,
            'popularArticles' => $popularArticles
        ];

        return view('artikel/detail', $data);
    }
}
