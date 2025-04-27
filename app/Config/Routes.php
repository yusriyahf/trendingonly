<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/category', 'Home::category');
$routes->get('/contact', 'Home::contact');
$routes->get('/author', 'Home::author');
$routes->get('/about', 'Home::about');
$routes->get('/blog-post', 'Home::blog');


$routes->get('/', 'Beranda::index');
$routes->get('(:segment)', 'Artikel::kategori/$1');
$routes->get('(:segment)/(:segment)', 'Artikel::detail/$1/$2');
