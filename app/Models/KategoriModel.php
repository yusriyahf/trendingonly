<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'tb_kategori';
    protected $primaryKey = 'id_kategori';
    protected $allowedFields = ['nama_kategori_id', 'nama_kategori_en', 'slug_id', 'slug_en', 'meta_title_id', 'meta_title_en', 'meta_description_id', 'meta_description_en', 'created_at'];
    protected $useTimestamps = false;

    public function getBySlug($slug_id)
    {
        return $this->where('slug_id', $slug_id)
            ->first();
    }
}
