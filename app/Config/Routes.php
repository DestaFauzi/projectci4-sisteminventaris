<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::index');
$routes->get('/auth', 'Auth::index');
$routes->post('/auth/login', 'Auth::login');
$routes->get('/auth/logout', 'Auth::logout');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/ruangan/data', 'Ruangan::index');
$routes->get('/ruangan/create', 'Ruangan::create');
$routes->post('/ruangan/store', 'Ruangan::store');
$routes->get('/datainventaris', 'Inventaris::index');
$routes->get('/datainventaris/user', 'Inventaris::indexuser');
$routes->get('/tambahinventaris', 'Inventaris::tambahinventaris');
$routes->post('/inventaris/store', 'Inventaris::store');
$routes->post('/inventaris/tambahkan', 'Invetaris::store');
$routes->get('/user/datauser', 'User::index');
$routes->get('/user/tambahuser', 'User::tambahuser');
$routes->post('/user/store', 'User::store');
$routes->get('/dataruangan', 'Ruangan::index');
$routes->get('/dataruangan/user', 'Ruangan::indexuser');
$routes->get('/peminjaman', 'Peminjaman::index');
$routes->get('/peminjaman/approval', 'Peminjaman::approvalList');
$routes->get('/peminjaman/approve/(:num)', 'Peminjaman::approve/$1');
$routes->get('/peminjaman/reject/(:num)', 'Peminjaman::reject/$1');
$routes->get('/peminjam/return/(:num)', 'Peminjaman::returnItem/$1');
$routes->get('send-email', 'Email::sendEmailForm');
$routes->post('send-email', 'Email::sendEmail');
$routes->get('/formpinjam', 'Peminjaman::create');
$routes->get('/testmail', 'Peminjaman::testEmail');
$routes->get('/peminjaman/create', 'peminjaman::store');
$routes->post('/peminjaman/store', 'peminjaman::store');
$routes->get('/peminjaman/detail', 'peminjaman::detail');
