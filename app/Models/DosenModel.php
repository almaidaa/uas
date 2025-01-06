<?php

namespace App\Models;

use CodeIgniter\Model;

class DosenModel extends Model
{
    protected $table = 'dosen';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'nip', 'nama', 'departemen', 'created_at', 'updated_at'];
    protected $useTimestamps = true;

    protected $validationRules = [
        'nip'     => 'required|is_unique[dosen.nip]|max_length[15]',
        'nama'    => 'required|min_length[3]|max_length[100]',
        'departemen'  => 'required|min_length[3]|max_length[100]',
    ];

    protected $validationMessages = [
        'nip' => [
            'is_unique' => 'NIP sudah terdaftar.',
        ],
    ];

    // Ambil semua data dosen dengan informasi dari tabel users

    public function getAllDosenWithUser()
    {
        $builder = $this->db->table($this->table)
            ->select('dosen.*, users.username, users.role')
            ->join('users', 'users.id = dosen.user_id', 'left');

        return $builder->get()->getResultArray();
    }

    // Ambil data dosen berdasarkan ID dengan informasi dari tabel users
    public function getDosenWithUser($id)
    {
        $builder = $this->db->table($this->table)
            ->select('dosen.*, users.username, users.role')
            ->join('users', 'users.id = dosen.user_id', 'left')
            ->where('dosen.id', $id);

        return $builder->get()->getRowArray();
    }

    // Tambahkan data dosen sekaligus membuat user baru
    public function createDosenWithUser(array $dosenData)
    {
        $db = \Config\Database::connect();
        $db->transStart();

        // Simpan data user ke tabel users
        $userData = [
            'username' => $dosenData['nip'], // Gunakan NIP sebagai username
            'password' => password_hash('default_password', PASSWORD_DEFAULT), // Default password
            'role'     => 'dosen',
        ];

        $userModel = new \App\Models\UserModel();
        $userModel->insert($userData);

        // Ambil ID pengguna yang baru ditambahkan
        $userId = $userModel->getInsertID();

        // Simpan data dosen dengan user_id
        $dosenData['user_id'] = $userId;
        $this->save($dosenData);

        $db->transComplete();
        return $db->transStatus();
    }

    public function getMataKuliahByDosen($dosenId)
    {
        return $this->db->table('mata_kuliah')
            ->select('mata_kuliah.nama_mk as nama_mata_kuliah, mata_kuliah.kode_mk as kode_mata_kuliah')
            ->where('mata_kuliah.dosen_id', $dosenId)
            ->get()
            ->getResultArray();
        // dd($dosenId);
    }
}
