<?php

// app/Controllers/Auth.php
namespace App\Controllers; // Menentukan bahwa file ini berada di dalam namespace App\Controllers
use App\Models\UserModel; // Mengimpor model UserModel agar bisa digunakan untuk berinteraksi dengan database (tabel pengguna).
use CodeIgniter\Controller; //  Mengimpor Controller dari CodeIgniter sebagai parent class.

class Auth extends Controller { // Mendeklarasikan class Auth yang mewarisi (extends) dari Controller.
    public function login() {// Memuat helper form yang menyediakan fungsi-fungsi bantu untuk memproses form.
        helper(['form']);
        if ($this->request->getMethod() === 'post') { // Mengecek apakah request yang masuk adalah metode POST.
            $model = new UserModel(); //Membuat instance dari UserModel.
            $user = $model->where('username', $this->request->getPost('username'))->first(); // Mencari pengguna berdasarkan username yang dikirim dari form.
            if ($user && password_verify($this->request->getPost('password'), $user['password'])) { // Mengecek apakah pengguna ditemukan dan password yang dimasukkan sesuai (diverifikasi menggunakan password_verify).
                session()->set(['user_id' => $user['id'], 'username' => $user['username']]); //Menyimpan data pengguna ke dalam sesi (session), menandakan bahwa pengguna telah login.
                return redirect()->to('/tugas'); // Mengarahkan pengguna ke halaman /tugas setelah login berhasil.
            }
            return redirect()->back()->with('error', 'Login gagal'); // Jika login gagal, kembali ke halaman login dan menampilkan pesan error.
        }
        return view('auth/login'); // Menampilkan view auth/login jika request bukan POST.
    }

    public function register() { // Memuat helper form
        helper(['form']); // Memuat helper form
        if ($this->request->getMethod() === 'post') {
            $model = new UserModel(); // Membuat instance dari UserModel.
            $data = [
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ]; // Mengambil data username dan password dari form, lalu mengenkripsi password dengan password_hash.
            $model->insert($data); // Menyimpan data pengguna baru ke database.
            return redirect()->to('/login'); // Mengarahkan ke halaman login setelah registrasi berhasil.
        }
        return view('auth/register'); // Menampilkan view auth/register jika request bukan POST.
    }

    public function logout() {
        session()->destroy(); // Menghapus semua data sesi (logout user).
        return redirect()->to('/login'); // Mengarahkan pengguna ke halaman login setelah logout.


    }
}
