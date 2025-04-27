<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = 'tb_artikel';
    protected $primaryKey = 'id_artikel';
    protected $allowedFields = ['id_user', 'id_kategori', 'judul_id', 'judul_en', 'slug_id', 'slug_en', 'konten_id', 'konten_en', 'thumbnail', 'tags_id', 'tags_en', 'views', 'meta_title_id', 'meta_title_en', 'meta_description_id', 'meta_description_en', 'published_at', 'created_at', 'updated_at'];
    protected $useTimestamps = false;

    public function getByKategori($id_kategori)
    {
        return $this->where('id_kategori', $id_kategori)
            ->orderBy('published_at', 'DESC')
            ->findAll();
    }

    public function getDetailArtikel($slug_id, $id_kategori)
    {
        return $this->select('tb_artikel.*, tb_users.nama_lengkap')
            ->join('tb_users', 'tb_users.id_user = tb_artikel.id_user', 'left')
            ->where('slug_id', $slug_id)
            ->where('id_kategori', $id_kategori)
            ->first();
    }


    // public function getDetailArtikel($slug_id, $id_kategori)
    // {
    //     return $this->where('slug_id', $slug_id)
    //         ->where('id_kategori', $id_kategori)
    //         ->first();
    // }

    // Artikel Kategori di Beranda
    public function getLatestByKategori($id_kategori, $limit = 3)
    {
        return $this->where('id_kategori', $id_kategori)
            ->orderBy('published_at', 'DESC')
            ->limit($limit)
            ->find();
    }
}
