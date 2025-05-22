<?php

use CodeIgniter\Router\RouteCollection; // Mengimpor class RouteCollection untuk mendefinisikan rute-rute URL dalam aplikasi.

/**
 * @var RouteCollection $routes // Memberi informasi ke editor bahwa variabel $routes adalah instance dari RouteCollection
 */
$routes->get('/login', 'Auth::login'); // Menampilkan form login
$routes->post('/login', 'Auth::login'); // Menangani permintaan POST ke /login, biasanya untuk memproses form login.
$routes->get('/register', 'Auth::register'); // Rute GET dan POST ke /register, menampilkan dan memproses form registrasi.
$routes->post('/register', 'Auth::register'); // Rute GET dan POST ke /register, menampilkan dan memproses form registrasi.
$routes->get('/logout', 'Auth::logout'); // Rute untuk logout, memanggil method logout() untuk menghapus session dan redirect ke login.

$routes->get('/tugas', 'Tugas::index'); // Menampilkan daftar tugas milik user yang sedang login
$routes->get('/tugas/tambah', 'Tugas::tambah'); // Menampilkan form untuk menambahkan tugas.
$routes->post('/tugas/tambah', 'Tugas::tambah'); //  Menyimpan data tugas baru ke database.
$routes->get('/tugas/edit/(:num)', 'Tugas::edit/$1'); // Menampilkan form edit tugas berdasarkan ID ((:num) artinya hanya angka).
$routes->post('/tugas/edit/(:num)', 'Tugas::edit/$1'); // Memproses update tugas berdasarkan ID tersebut
$routes->get('/tugas/hapus/(:num)', 'Tugas::hapus/$1'); // Menghapus tugas berdasarkan ID yang diberikan di URL.
