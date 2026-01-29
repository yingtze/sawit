<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::index');
$routes->get('login', 'Auth::index');
$routes->post('auth/login', 'Auth::login');
$routes->get('logout', 'Auth::logout');

$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'Home::index');

    // Modul Petani
    $routes->get('petani', 'Petani::index');
    $routes->get('petani/create', 'Petani::create');
    $routes->post('petani/store', 'Petani::store');
    $routes->get('petani/edit/(:num)', 'Petani::edit/$1');
    $routes->post('petani/update/(:num)', 'Petani::update/$1');
    $routes->get('petani/delete/(:num)', 'Petani::delete/$1');

    // Modul Sawit
    $routes->get('sawit', 'Sawit::index');
    $routes->get('sawit/create', 'Sawit::create');
    $routes->post('sawit/store', 'Sawit::store');
    $routes->get('sawit/edit/(:num)', 'Sawit::edit/$1');
    $routes->post('sawit/update/(:num)', 'Sawit::update/$1');
    $routes->get('sawit/delete/(:num)', 'Sawit::delete/$1');

    // Modul Transaksi
    $routes->get('transaksi', 'Transaksi::index');
    $routes->get('transaksi/create', 'Transaksi::create');
    $routes->post('transaksi/store', 'Transaksi::store');

    // Modul Laporan
    $routes->get('laporan', 'Laporan::index');
});
