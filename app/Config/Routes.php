<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/category', 'Home::category');
$routes->get('/contact', 'Home::contact');
$routes->get('/author', 'Home::author');
$routes->get('/about', 'Home::about');
$routes->get('/blog-post', 'Home::blog');
