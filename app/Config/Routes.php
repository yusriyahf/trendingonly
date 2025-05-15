<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/category', 'Home::category');
$routes->get('/contact', 'Home::contact');
$routes->get('/author', 'Home::author');
$routes->get('/about', 'Home::about');
$routes->get('/blog-post', 'Home::blog');






//penulis
$routes->get('login', 'LoginController::index');
$routes->post('login/process', 'LoginController::process');
$routes->get('logout', 'LoginController::logout');

$routes->get('penulis/dashboard', 'penulis\DashboardController::index');

$routes->get('penulis/profil/edit', 'penulis\Profil::edit');
$routes->post('penulis/profil/proses_edit', 'penulis\Profil::proses_edit');

// ADMIN CATEGORY ARTICLES
$routes->get('penulis/kategoriArtikel/index', 'penulis\KategoriArtikel::index');
$routes->get('penulis/kategoriArtikel/tambah', 'penulis\KategoriArtikel::tambah');
$routes->post('penulis/kategoriArtikel/proses_tambah', 'penulis\KategoriArtikel::proses_tambah');
$routes->get('penulis/kategoriArtikel/edit/(:num)', 'penulis\KategoriArtikel::edit/$1');
$routes->post('penulis/kategoriArtikel/proses_edit/(:num)', 'penulis\KategoriArtikel::proses_edit/$1');
$routes->get('penulis/kategoriArtikel/delete/(:any)', 'penulis\KategoriArtikel::delete/$1');

// ADMIN ARTICLES
$routes->get('penulis/berita/index', 'penulis\BeritaController::index');
$routes->get('penulis/berita/tambah', 'penulis\BeritaController::tambah');
$routes->post('penulis/berita/proses_tambah', 'penulis\BeritaController::proses_tambah');
$routes->get('penulis/berita/edit/(:num)', 'penulis\BeritaController::edit/$1');
$routes->post('penulis/berita/proses_edit/(:num)', 'penulis\BeritaController::proses_edit/$1');
$routes->get('penulis/berita/delete/(:any)', 'penulis\BeritaController::delete/$1');



$routes->get('penulis/profil', 'Penulis\ProfilController::index');
$routes->post('penulis/profil/update-username', 'Penulis\ProfilController::updateUsername');
$routes->post('penulis/profil/update-nama', 'Penulis\ProfilController::updateNamaLengkap');
$routes->post('penulis/profil/update-foto', 'Penulis\ProfilController::updateFotoProfil');
$routes->post('penulis/profil/update-password', 'Penulis\ProfilController::updatePassword');




$routes->get('admin/dashboard', 'admin\DashboardController::index');

// ADMIN PROFILE
$routes->get('admin/profil/edit', 'admin\Profil::edit');
$routes->post('admin/profil/proses_edit', 'admin\Profil::proses_edit');

// ADMIN CATEGORY ARTICLES
$routes->get('admin/kategoriArtikel/index', 'admin\KategoriArtikel::index');
$routes->get('admin/kategoriArtikel/tambah', 'admin\KategoriArtikel::tambah');
$routes->post('admin/kategoriArtikel/proses_tambah', 'admin\KategoriArtikel::proses_tambah');
$routes->get('admin/kategoriArtikel/edit/(:num)', 'admin\KategoriArtikel::edit/$1');
$routes->post('admin/kategoriArtikel/proses_edit/(:num)', 'admin\KategoriArtikel::proses_edit/$1');
$routes->get('admin/kategoriArtikel/delete/(:any)', 'admin\KategoriArtikel::delete/$1');

// ADMIN ARTICLES
$routes->get('admin/artikel/index', 'admin\ArtikelController::index');
$routes->get('admin/artikel/tambah', 'admin\ArtikelController::tambah');
$routes->post('admin/artikel/proses_tambah', 'admin\ArtikelController::proses_tambah');
$routes->get('admin/artikel/edit/(:num)', 'admin\ArtikelController::edit/$1');
$routes->post('admin/artikel/proses_edit/(:num)', 'admin\ArtikelController::proses_edit/$1');
$routes->get('admin/artikel/delete/(:any)', 'admin\ArtikelController::delete/$1');

$routes->get('admin/penulis/index', 'admin\PenulisController::index');
$routes->get('admin/penulis/tambah', 'admin\PenulisController::tambah');
$routes->post('admin/penulis/proses_tambah', 'admin\PenulisController::proses_tambah');
$routes->get('admin/penulis/edit/(:num)', 'admin\PenulisController::edit/$1');
$routes->post('admin/penulis/proses_edit/(:num)', 'admin\PenulisController::proses_edit/$1');
$routes->get('admin/penulis/delete/(:any)', 'admin\PenulisController::delete/$1');

//is_approved
$routes->get('admin/artikel/set_approval/(:num)/(:any)', 'Admin\ArtikelController::set_approval/$1/$2');


$routes->get('/', 'Beranda::index');
$routes->get('(:segment)', 'Artikel::kategori/$1');
$routes->get('(:segment)/(:segment)', 'Artikel::detail/$1/$2');