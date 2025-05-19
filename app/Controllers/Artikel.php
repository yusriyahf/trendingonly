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

    public function kategori($lang, $kategoriSlug)
    {
        // Ambil bahasa dari segment URL pertama (misal: 'id' atau 'en')
        $lang = service('uri')->getSegment(1) ?? 'id';

        // Ambil kategori berdasarkan slug dan bahasa
        $kategori = $this->kategoriModel->getBySlug($kategoriSlug, $lang);
        if (!$kategori) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Kategori tidak ditemukan');
        }

        $categorySlugCheck = ($lang === 'id') ? $kategori['slug_id'] : $kategori['slug_en'];

        $canonical = base_url("$lang/" . ($categorySlugCheck !== false ? $categorySlugCheck : ''));


        if (current_url() !== $canonical) {
            return redirect()->to($canonical);
        }


        // Ambil semua kategori (tanpa thumbnail, untuk hitung artikel)
        $kategoris = $this->kategoriModel->findAll();

        // Ambil kategori dengan thumbnail (sekali panggil saja)
        $categories = $this->kategoriModel->get_categories_with_thumbnails();

        // Ambil artikel berdasarkan kategori id
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

        $popularArticles = $this->artikelModel
            ->where('published_at <=', date('Y-m-d H:i:s'))
            ->orderBy('views', 'DESC')
            ->orderBy('published_at', 'DESC')
            ->findAll(4);

        foreach ($popularArticles as &$article) {
            $article['kategori'] = $this->kategoriModel->find($article['id_kategori']);
        }

        $meta = $this->kategoriModel->getMetaOnly($kategoriSlug);

        // dd($meta);
        $data = [
            'lang' => $lang,
            'meta' => $meta,
            'kategori' => $kategori,
            'artikels' => $artikels,
            'categories' => $categories,
            'allKategoris' => $kategoriWithCount,
            'popularArticles' => $popularArticles
        ];

        return view('artikel/kategori', $data);
    }

    public function detail($lang, $kategoriSlug, $artikelSlug)
    {
        $kategoris = $this->kategoriModel->findAll();

        $kategori = $this->kategoriModel->getBySlug($kategoriSlug, $lang);
        if (!$kategori) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Kategori tidak ditemukan');
        }

        $artikel = $this->artikelModel->getDetailArtikel($artikelSlug, $kategori['id_kategori'], $lang);
        if (!$artikel) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Artikel tidak ditemukan');
        }

        // Canonical redirect check
        $correctKategoriSlug = $lang === 'en' ? strtolower($kategori['slug_en']) : strtolower($kategori['slug_id']);
        $correctArtikelSlug = $lang === 'en' ? strtolower($artikel['slug_en']) : strtolower($artikel['slug_id']);

        // Bandingkan dengan slug yang datang dari URL
        if (
            strtolower($kategoriSlug) !== $correctKategoriSlug ||
            strtolower($artikelSlug) !== $correctArtikelSlug
        ) {
            $canonicalUrl = base_url("$lang/$correctKategoriSlug/$correctArtikelSlug");
            return redirect()->to($canonicalUrl);
        }

        // Sidebar: kategori + jumlah artikel
        $kategoriWithCount = [];
        foreach ($kategoris as $kg) {
            $count = $this->artikelModel->where('id_kategori', $kg['id_kategori'])->countAllResults();
            $kategoriWithCount[] = [
                'kategori' => $kg,
                'count' => $count
            ];
        }

        // Artikel terkait
        $relatedArticles = $this->artikelModel->getRelatedArticles($artikel['id_artikel'], $kategori['id_kategori'], 3);

        // Artikel populer
        $popularArticles = $this->artikelModel
            ->where('published_at <=', date('Y-m-d H:i:s'))
            ->orderBy('views', 'DESC')
            ->orderBy('published_at', 'DESC')
            ->findAll(4);

        foreach ($popularArticles as &$article) {
            $article['kategori'] = $this->kategoriModel->find($article['id_kategori']);
        }

        // Meta
        $meta = $this->artikelModel->getMetaOnly($artikelSlug, $kategori['id_kategori']);

        return view('artikel/detail', [
            'lang' => $lang,
            'meta' => $meta,
            'kategori' => $kategori,
            'artikel' => $artikel,
            'allKategoris' => $kategoriWithCount,
            'popularArticles' => $popularArticles,
            'relatedArticles' => $relatedArticles,
        ]);
    }
}
