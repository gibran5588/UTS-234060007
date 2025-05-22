<?php

namespace App\Controllers; // Menyatakan bahwa class Tugas berada di dalam folder App/Controllers.
use App\Models\TugasModel; // Mengimpor TugasModel agar dapat digunakan untuk berinteraksi dengan data tugas di database.
use CodeIgniter\Controller; // Mengimpor class induk Controller dari CodeIgniter.

class Tugas extends Controller { // Mendeklarasikan controller Tugas yang mewarisi fungsi dasar dari Controller.
    public function index() { // Membuat instance dari model TugasModel
        $model = new TugasModel(); // Membuat instance dari model TugasModel
        $data['tugas'] = $model->where('user_id', session()->get('user_id'))->findAll(); // Mengambil semua data tugas milik pengguna yang sedang login berdasarkan user_id.
        return view('tugas/index', $data); // Menampilkan view tugas/index dan mengirim data tugas ke tampilan.
    }

    public function tambah() {
        if ($this->request->getMethod() === 'post') { // Mengecek apakah request dari form adalah POST.
            $model = new TugasModel(); // Membuat instance model TugasModel.
            $model->save([
                'judul' => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'deadline' => $this->request->getPost('deadline'),
                'status' => $this->request->getPost('status'),
                'user_id' => session()->get('user_id'),
            ]); // Menyimpan data tugas baru ke database, termasuk data dari form dan user_id dari session.
            return redirect()->to('/tugas'); // Setelah data disimpan, pengguna diarahkan ke halaman daftar tugas.
        }
        return view('tugas/tambah'); // Jika request bukan POST, tampilkan form input tugas.
    }

    public function edit($id) { // Membuat instance dari model.
        $model = new TugasModel(); // Membuat instance dari model.
        if ($this->request->getMethod() === 'post') { // Mengecek apakah form edit disubmit (POST).
            $model->update($id, [
                'judul' => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'deadline' => $this->request->getPost('deadline'),
                'status' => $this->request->getPost('status'),
            ]); // Memperbarui data tugas sesuai ID berdasarkan input dari form.
            return redirect()->to('/tugas'); // Mengarahkan kembali ke daftar tugas setelah update.
        }
        $data['tugas'] = $model->find($id); // Jika belum POST, ambil data tugas yang akan diedit berdasarkan ID-nya.
        return view('tugas/edit', $data); // Tampilkan form edit dengan data tugas yang sudah ada.
    }

    public function hapus($id) {
        $model = new TugasModel();
        $model->delete($id); // Membuat instance model dan menghapus tugas berdasarkan ID.
        return redirect()->to('/tugas'); // Setelah menghapus, arahkan ke daftar tugas.
    }
}
