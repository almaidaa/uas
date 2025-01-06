<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use App\Models\NilaiModel;

class MahasiswaController extends BaseController
{
    protected $mahasiswaModel;
    protected $nilaiModel;

    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
        $this->nilaiModel = new NilaiModel();
    }

    public function lihatNilai()
    {
        $mahasiswaId = session()->get('id');

        $data['nilai'] = $this->nilaiModel
            ->select('mata_kuliah.nama_mk as mata_kuliah, dosen.nama as dosen, nilai.nilai')
            ->join('mata_kuliah', 'mata_kuliah.id = nilai.mata_kuliah_id')
            ->join('dosen', 'dosen.id = nilai.dosen_id')
            ->where('nilai.mahasiswa_id', $mahasiswaId)
            ->findAll();

        return view('mahasiswa/nilai', $data);
    }


    public function index()
    {
        $data['mahasiswa'] = $this->mahasiswaModel->findAll();
        return view('mahasiswa/index', $data);
    }

    public function create()
    {
        return view('mahasiswa/create');
    }

    public function store()
    {
        $this->mahasiswaModel->save([
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'jurusan' => $this->request->getPost('jurusan'),
            'angkatan' => $this->request->getPost('angkatan'),
        ]);

        return redirect()->to('/mahasiswa');
    }
}
