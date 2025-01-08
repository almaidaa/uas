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
        'nilai',
    ];
    protected $useTimestamps = true;

    public function getMahasiswaByJadwal($jadwalId)
    {
        return $this->select('krs.id, mahasiswa.nim, mahasiswa.nama')
            ->join('mahasiswa', 'mahasiswa.id = krs.mahasiswa_id')
            ->where('krs.jadwal_id', $jadwalId)
            ->findAll();
    }
}
