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


$routes->get('/', 'Beranda::index');
$routes->get('(:segment)', 'Artikel::kategori/$1');
$routes->get('(:segment)/(:segment)', 'Artikel::detail/$1/$2');