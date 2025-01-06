<?php

namespace App\Models;

use CodeIgniter\Model;

class KrsModel extends Model
{
    protected $table      = 'krs';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'mahasiswa_id',
        'mata_kuliah_id',
        'jadwal_id',
        'semester',
    ];

    protected $useTimestamps = true;
}
