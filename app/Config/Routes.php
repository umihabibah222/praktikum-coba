<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default Routes
$routes->get('/', 'AuthController::login');
$routes->setDefaultController('Auth');

// Auth Routes
$routes->get('/login', 'AuthController::login');
$routes->post('/authenticate', 'AuthController::authenticate');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/register', 'AuthController::register');
$routes->post('/register/store', 'AuthController::store');

// Dashboard Route
$routes->get('/dashboard', 'Dashboard::index');

// Mahasiswa Route
$routes->get('data-master-mahasiswa', 'Mahasiswa\Home::index'); // Ini yang Anda butuhkan

//CRUD Mahasiswa
// Rute untuk daftar data mahasiswa
$routes->get('data-master-mahasiswa', 'Mahasiswa\DataMahasiswa::index');

// Rute untuk form tambah data mahasiswa
$routes->get('data-master-mahasiswa/create', 'Mahasiswa\DataMahasiswa::create');

// Rute untuk edit data mahasiswa
$routes->get('data-master-mahasiswa/edit/(:num)', 'Mahasiswa\DataMahasiswa::edit/$1');
$routes->match(['put', 'post'], 'data-master-mahasiswa/update/(:num)', 'Mahasiswa\DataMahasiswa::update/$1');

// Rute untuk hapus data mahasiswa
$routes->get('data-master-mahasiswa/hapus/(:num)', 'Mahasiswa\DataMahasiswa::hapus/$1');

// Rute untuk simpan data mahasiswa (POST)
$routes->post('data-master-mahasiswa/simpan', 'Mahasiswa\DataMahasiswa::save');