<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default route langsung ke form register
$routes->get('/', 'Auth::register');

// Routes Tugas Akhir
$routes->get('pemilu', 'Tugasakhir::index');
$routes->get('beranda', 'Tugasakhir::index');

// Routes Dashboard (peta Flask)
$routes->get('dashboard', 'Dashboard::index'); 

// Routes Dashboard Umum (dashboard Flask)
$routes->get('dashboard_umum', 'Dashboard::dashboard_umum'); 
$routes->get('dashboard_analisis', 'Dashboard::dashboard_analisis');

// Routes untuk Auth
$routes->get('register', 'Auth::register');                 // tampilkan form registrasi
$routes->post('auth/register', 'Auth::processRegister');    // proses data registrasi
$routes->get('login', 'Auth::login');                       // tampilkan form login
$routes->post('auth/login', 'Auth::processLogin');          // proses data login
$routes->get('logout', 'Auth::logout');                     // logout user

// Halaman profil
$routes->get('/profil', 'Profil::index');
$routes->post('/profil/update', 'Profil::update');
$routes->post('/profil/hapusFoto', 'Profil::hapusFoto');