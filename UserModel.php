<?php

namespace App\Models; // Menentukan bahwa file ini berada di dalam namespace App\Models, yang berarti disimpan di direktori app/Models.
use CodeIgniter\Model; // Mengimpor class Model milik CodeIgniter yang digunakan sebagai induk (parent) untuk UserModel.

class UserModel extends Model { // class UserModel extends Model {
    protected $table = 'users'; // Menentukan bahwa model ini terhubung ke tabel database dengan nama users.
    protected $allowedFields = ['username', 'password']; // Menentukan kolom mana saja yang boleh diisi/dimodifikasi lewat method insert(), update(), atau save().
    protected $useTimestamps = false; // Butuh penjelasan untuk TugasModel juga?
}
