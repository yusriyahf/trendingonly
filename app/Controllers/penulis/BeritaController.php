<?php

namespace App\Controllers\penulis;

use App\Models\BeritaModel;
use App\Models\KategoriModel;

class BeritaController extends BaseController
{
    private $artikelModel;
    private $kategoriModel;

    public function __construct()
    {
        $this->artikelModel = new BeritaModel();
        $this->kategoriModel = new KategoriModel();
    }

    public function generateSlug($string)
    {
        // Ubah string menjadi huruf kecil
        $slug = strtolower($string);
        // Hapus semua karakter non-alfanumerik kecuali spasi
        $slug = preg_replace('/[^a-z0-9\s]/', '', $slug);
        // Ganti spasi dengan tanda hubung
        $slug = preg_replace('/\s+/', '-', $slug);
        return $slug;
    }


    public function index()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Sesuaikan dengan halaman login Anda
        }

        $data = [
            'artikels' => $this->artikelModel->where('id_user', session()->get('id_user'))->findAll(),
        ];

        return view('penulis/berita/index', $data);
    }

    public function tambah()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Sesuaikan dengan halaman login Anda
        }

        $aktivitas_kategori = new KategoriModel();
        $all_data_kategori = $aktivitas_kategori->findAll();

        return view('penulis/berita/tambah', [
            'all_data_kategori' => $all_data_kategori,
            'validation' => $this->validator
        ]);
    }

    public function proses_tambah()
    {
        // Pengecekan login
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $id_user = session()->get('id_user');
        $judul_id = $this->request->getVar('judul_id');
        $judul_en = $this->request->getVar('judul_en');
        $konten_id = $this->request->getVar('konten_id');
        $konten_en = $this->request->getVar('konten_en');
        $id_kategori = $this->request->getVar('id_kategori');
        $tags_id = $this->request->getVar('tags_id');
        $tags_en = $this->request->getVar('tags_en');
        $meta_title_id = $this->request->getVar('meta_title_id');
        $meta_title_en = $this->request->getVar('meta_title_en');
        $meta_description_id = $this->request->getVar('meta_description_id');
        $meta_description_en = $this->request->getVar('meta_description_en');
        $photo_source = $this->request->getVar('photo_source');

        // Generate slug
        $slug_id = $this->generateSlug($judul_id);
        $slug_en = $this->generateSlug($judul_en);

        // Validasi judul
        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $judul_id)) {
            session()->setFlashdata('error', 'Judul artikel (ID) hanya boleh berisi huruf dan angka.');
            return redirect()->back()->withInput();
        }
        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $judul_en)) {
            session()->setFlashdata('error', 'Judul artikel (EN) hanya boleh berisi huruf dan angka.');
            return redirect()->back()->withInput();
        }

        // Validasi upload (tanpa validasi dimensi karena sudah di-crop)
        $validationRules = [
            'thumbnail' => [
                'rules' => 'uploaded[thumbnail]|is_image[thumbnail]|max_size[thumbnail,300]|mime_in[thumbnail,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Thumbnail wajib diisi',
                    'is_image' => 'File thumbnail harus berupa gambar',
                    'max_size' => 'Ukuran thumbnail maksimal 300 KB',
                    'mime_in' => 'Format thumbnail harus JPG/JPEG/PNG'
                ]
            ],
            'featured_image' => [
                'rules' => 'is_image[featured_image]|max_size[featured_image,300]|mime_in[featured_image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'is_image' => 'File gambar utama harus berupa gambar',
                    'max_size' => 'Ukuran gambar utama maksimal 300 KB',
                    'mime_in' => 'Format gambar utama harus JPG/JPEG/PNG'
                ]
            ]
        ];

        if (!$this->validate($validationRules)) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        // Proses thumbnail (cropped)
        $thumbnailCropped = $this->request->getVar('thumbnail_cropped');
        $thumbnailName = null;
        if (!empty($thumbnailCropped)) {
            $thumbnailName = $this->saveCroppedImage(
                $thumbnailCropped,
                'thumbnail-' . $judul_id,
                'assets/img/thumbnail/'
            );
        }

        // Proses featured image (cropped)
        $featuredCropped = $this->request->getVar('featured_cropped');
        $featuredName = null;
        if (!empty($featuredCropped)) {
            $featuredName = $this->saveCroppedImage(
                $featuredCropped,
                'featured-' . $judul_id,
                'assets/img/gambar_besar/'
            );
        }

        // Simpan ke database
        $data = [
            'id_user' => $id_user,
            'id_kategori' => $id_kategori,
            'judul_id' => $judul_id,
            'judul_en' => $judul_en,
            'slug_id' => $slug_id,
            'slug_en' => $slug_en,
            'konten_id' => $konten_id,
            'konten_en' => $konten_en,
            'thumbnail' => $thumbnailName,
            'gambar_besar' => $featuredName,
            'sumber_gambar' => $photo_source,
            'tags_id' => $tags_id,
            'tags_en' => $tags_en,
            'meta_title_id' => $meta_title_id,
            'meta_title_en' => $meta_title_en,
            'meta_description_id' => $meta_description_id,
            'meta_description_en' => $meta_description_en,
            'published_at' => date('Y-m-d H:i:s')
        ];

        $this->artikelModel->insert($data);

        session()->setFlashdata('success', 'Artikel berhasil ditambahkan!');
        return redirect()->to(base_url('penulis/berita/index'));
    }

    /**
     * Helper untuk menyimpan gambar cropped (base64) ke file
     */
    private function saveCroppedImage($base64Data, $prefix, $uploadPath)
    {
        // Hapus header base64
        $base64Data = preg_replace('#^data:image/\w+;base64,#i', '', $base64Data);
        $imageData = base64_decode($base64Data);

        // Generate nama file unik
        $fileName = $prefix . '-' . time() . '.jpg';
        $filePath = $uploadPath . $fileName;

        // Simpan ke direktori
        file_put_contents(FCPATH . $filePath, $imageData);

        return $fileName;
    }

    public function edit($id_artikel)
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Sesuaikan dengan halaman login Anda
        }

        $artikelData = $this->artikelModel->find($id_artikel);
        $kategori = $this->kategoriModel->findAll();
        $validation = \Config\Services::validation();

        return view('penulis/berita/edit', [
            'artikelData' => $artikelData,
            'all_data_kategori' => $kategori,
            'validation' => $validation
        ]);
    }

    public function proses_edit($id_artikel = null)
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Sesuaikan dengan halaman login Anda
        }

        if (!$id_artikel) {
            return redirect()->back();
        }

        $id_kategori_artikel = $this->request->getVar("id_kategori_artikel");
        $judul_artikel_id = $this->request->getVar("judul_artikel_id");
        $judul_artikel_en = $this->request->getVar("judul_artikel_en");
        $snippet_id = $this->request->getVar("snippet_id");
        $snippet_en = $this->request->getVar("snippet_en");
        $deskripsi_artikel_id = $this->request->getVar("deskripsi_artikel_id");
        $deskripsi_artikel_en = $this->request->getVar("deskripsi_artikel_en");
        $alt_artikel_id = $this->request->getVar("alt_artikel_id");
        $alt_artikel_en = $this->request->getVar("alt_artikel_en");
        $title_artikel_id = $this->request->getVar("title_artikel_id");
        $title_artikel_en = $this->request->getVar("title_artikel_en");
        $meta_desc_id = $this->request->getVar("meta_desc_id");
        $meta_desc_en = $this->request->getVar("meta_desc_en");

        // Buat slug_artikel_id dari judul_artikel
        $slug_artikel_id = $this->generateSlug($judul_artikel_id);
        $slug_artikel_en = $this->generateSlug($judul_artikel_en);

        // Validasi judul artikel dalam bahasa Indonesia
        // if (!preg_match('/^[a-zA-Z0-9\s]+$/', $judul_artikel_id)) {
        //     session()->setFlashdata('error', 'Judul artikel dalam bahasa Indonesia hanya boleh berisi huruf dan angka.');
        //     return redirect()->back()->withInput();
        // }

        // // Validasi judul artikel dalam bahasa Inggris
        // if (!preg_match('/^[a-zA-Z0-9\s]+$/', $judul_artikel_en)) {
        //     session()->setFlashdata('error', 'Judul artikel dalam bahasa Inggris hanya boleh berisi huruf dan angka.');
        //     return redirect()->back()->withInput();
        // }

        // $file_foto = $this->request->getFile('foto_artikel');

        // // Jika file foto di-upload
        // if ($file_foto->isValid()) {
        //     // Hapus foto lama jika ada
        //     $artikelData = $this->artikelModel->find($id_artikel);
        //     $oldFilePath = 'assets/img/artikel/' . $artikelData->foto_artikel;
        //     if (file_exists($oldFilePath)) {
        //         unlink($oldFilePath);
        //     }

        //     // Simpan foto baru
        //     $newFileName = $file_foto->getRandomName();
        //     $file_foto->move('asset-user/images', $newFileName);
        // } else {
        //     $artikelData = $this->artikelModel->find($id_artikel);
        //     $newFileName = $artikelData->foto_artikel;
        // }

        // Update data artikel
        $data = [
            'id_kategori_artikel' => $id_kategori_artikel,
            'judul_artikel_id' => $judul_artikel_id,
            'judul_artikel_en' => $judul_artikel_en,
            'slug_artikel_id' => $slug_artikel_id,
            'slug_artikel_en' => $slug_artikel_en,
            'snippet_id' => $snippet_id,
            'snippet_en' => $snippet_en,
            'deskripsi_artikel_id' => $deskripsi_artikel_id,
            'deskripsi_artikel_en' => $deskripsi_artikel_en,
            // 'foto_artikel' => $newFileName,
            'alt_artikel_id' => $alt_artikel_id,
            'alt_artikel_en' => $alt_artikel_en,
            'title_artikel_id' => $title_artikel_id,
            'title_artikel_en' => $title_artikel_en,
            'meta_desc_id' => $meta_desc_id,
            'meta_desc_en' => $meta_desc_en,

        ];

        $this->artikelModel->update($id_artikel, $data);

        return redirect()->to(base_url('penulis/berita/index'));
    }

    public function delete($id = false)
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Sesuaikan dengan halaman login Anda
        }

        $data = $this->artikelModel->find($id);
        unlink('assets/img/artikel/' . $data['foto_artikel']);
        $this->artikelModel->delete($id);

        return redirect()->to(base_url('penulis/berita/index'));
    }
}
