<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = 'tb_artikel';
    protected $primaryKey = 'id_artikel';
    protected $allowedFields = ['id_user', 'id_kategori', 'judul_id', 'judul_en', 'slug_id', 'slug_en', 'konten_id', 'konten_en', 'thumbnail', 'tags_id', 'tags_en', 'views', 'meta_title_id', 'meta_title_en', 'meta_description_id', 'meta_description_en', 'published_at', 'created_at', 'updated_at'];
    protected $useTimestamps = false;

    /**
     * Mengambil artikel populer berdasarkan jumlah views
     * 
     * @param int $limit Jumlah artikel yang ingin diambil
     * @param string $language Bahasa yang digunakan (id/en)
     * @return array
     */
    public function getPopularArticles($limit = 1, $language = 'id')
    {
        return $this->select("
        tb_artikel.*, 
        tb_users.nama_lengkap as nama_penulis,  // Pastikan alias sesuai
        tb_kategori.nama_kategori_{$language} as nama_kategori,
        tb_kategori.slug_{$language} as slug_kategori
    ")
            ->join('tb_users', 'tb_users.id_user = tb_artikel.id_user', 'left')
            ->join('tb_kategori', 'tb_kategori.id_kategori = tb_artikel.id_kategori', 'left')
            ->where('published_at IS NOT NULL')
            ->where('published_at <=', date('Y-m-d H:i:s'))
            ->orderBy('views', 'DESC')
            ->orderBy('published_at', 'DESC')
            ->limit($limit)
            ->find();
    }

    public function getByKategori($id_kategori)
    {
        return $this->select('tb_artikel.*, tb_users.nama_lengkap')
            ->join('tb_users', 'tb_users.id_user = tb_artikel.id_user', 'left')
            ->where('id_kategori', $id_kategori)
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

    // Artikel Kategori di Beranda
    public function getLatestByKategori($id_kategori, $limit = 6)
    {
        return $this->select('tb_artikel.*, tb_users.nama_lengkap')
            ->join('tb_users', 'tb_users.id_user = tb_artikel.id_user', 'left')
            ->where('id_kategori', $id_kategori)
            ->orderBy('published_at', 'DESC')
            ->limit($limit)
            ->find();
    }

    public function countByKategori($id_kategori)
    {
        return $this->where('id_kategori', $id_kategori)
            ->countAllResults();
    }

    public function getArtikelByKategori($id_kategori, $limit, $excluded_ids = [])
    {
        $builder = $this->db->table('tb_artikel')
            ->select('tb_artikel.*, tb_users.nama_lengkap')
            ->join('tb_users', 'tb_users.id_user = tb_artikel.id_user', 'left')
            ->where('id_kategori', $id_kategori)
            ->orderBy('published_at', 'DESC');

        if (!empty($excluded_ids)) {
            $builder->whereNotIn('id_artikel', $excluded_ids);
        }

        return $builder->limit($limit)->get()->getResultArray();
    }
}
