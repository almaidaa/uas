<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'nim', 'nama', 'jurusan', 'angkatan', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}
