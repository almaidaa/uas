<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/login', 'AuthController::login');
$routes->post('/login/process', 'AuthController::processLogin');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'auth']);

// $routes->get('/dashboard', 'DashboardController::index');

// Routes untuk Admin
$routes->group('admin', ['filter' => 'auth:admin'], function ($routes) {
    $routes->get('/', 'AdminController::index');
    //admin - mahasiswa
    $routes->get('mahasiswa/mahasiswa', 'AdminController::manageMahasiswa');
    $routes->get('mahasiswa/create', 'AdminController::createmhs');
    $routes->post('mahasiswa/mahasiswa/store', 'AdminController::storemhs');

    //admin - dosen
    $routes->get('dosen/index', 'AdminController::manageDosen');
    $routes->get('dosen/create', 'AdminController::createdosen');
    $routes->post('dosen/index/store', 'AdminController::storedosen');

    // admin - mk
    $routes->get('mata_kuliah/index', 'AdminController::manageMataKuliah');
    $routes->get('mata_kuliah/create', 'AdminController::createmk');
    $routes->post('mata_kuliah/index/store', 'AdminController::storemk');

    //admin - jadwal
    $routes->get('jadwal/index', 'AdminController::manageJadwal');
    $routes->get('jadwal/create', 'AdminController::createjdwl');
    $routes->post('jadwal/index/store', 'AdminController::storejdwl');

    $routes->get('laporan', 'AdminController::laporan');
    $routes->get('notifikasi', 'AdminController::manageNotifikasi');
});


// Routes untuk Dosen
$routes->group('dosen', ['filter' => 'auth:dosen'], function ($routes) {
    $routes->get('jadwal/index', 'DosenController::jadwal');
    $routes->get('input_nilai/(:num)', 'DosenController::inputNilai/$1');
    $routes->get('nilai', 'NilaiController::index');
    $routes->get('nilai/create', 'NilaiController::create');
    $routes->post('nilai/store', 'NilaiController::store');
    $routes->get('detail/(:num)', 'DosenController::detail/$1');
});

// Routes untuk Mahasiswa
$routes->group('mahasiswa', ['filter' => 'auth'], function ($routes) {
    $routes->get('nilai', 'MahasiswaController::lihatNilai', ['filter' => 'role:mahasiswa']);
    $routes->get('profile', 'MahasiswaController::profile', ['filter' => 'role:mahasiswa']);
});

$routes->group('jadwal', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'JadwalController::index');
    $routes->get('create', 'JadwalController::create');
    $routes->post('store', 'JadwalController::store');
});

$routes->group('krs', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'KrsController::index');
    $routes->get('create', 'KrsController::create');
    $routes->post('store', 'KrsController::store');
});

$routes->group('khs', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'KhsController::index');
});




// $routes->get('/dashboard', 'DashboardController::index');

// $routes->get('/mahasiswa', 'MahasiswaController::index');
// $routes->get('/mahasiswa/create', 'MahasiswaController::create');
// $routes->post('/mahasiswa/store', 'MahasiswaController::store');

// $routes->get('/dosen', 'DosenController::index');
// $routes->get('/dosen/create', 'DosenController::create');
// $routes->post('/dosen/store', 'DosenController::store');

// $routes->get('/matakuliah', 'MataKuliahController::index');
// $routes->get('/matakuliah/create', 'MataKuliahController::create');
// $routes->post('/matakuliah/store', 'MataKuliahController::store');

// $routes->get('/nilai', 'NilaiController::index');
// $routes->get('/nilai/create', 'NilaiController::create');
// $routes->post('/nilai/store', 'NilaiController::store');
