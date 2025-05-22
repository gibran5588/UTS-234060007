<?php

namespace App\Models; // Menunjukkan bahwa file ini berada di dalam namespace App\Models, yang berarti berada di folder app/Models.
use CodeIgniter\Model; // Mengimpor class Model dari CodeIgniter, yang berisi fungsi-fungsi bawaan untuk berinteraksi dengan database seperti findAll(), insert(), update(), delete(), dll.

class TugasModel extends Model { // Mendeklarasikan class TugasModel yang merupakan turunan dari CodeIgniter\Model. Model ini dipakai untuk mengelola data dari tabel tugas.
    protected $table = 'tugas'; // Menentukan bahwa model ini terhubung dengan tabel tugas di database.
    protected $allowedFields = ['judul', 'deskripsi', 'deadline', 'status', 'user_id']; // Menyebutkan kolom-kolom mana saja yang boleh diisi atau diubah melalui fungsi insert(), save(), atau update().
    protected $useTimestamps = false; // Menyatakan bahwa model tidak otomatis mengatur kolom waktu (created_at dan updated_at).
}
