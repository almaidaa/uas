<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use App\Models\NilaiModel;
use App\Models\KrsModel;
use App\Models\MataKuliahModel;

class MahasiswaController extends BaseController
{
    protected $mahasiswaModel;
    protected $nilaiModel;
    protected $krsModel;
    protected $mataKuliahModel;
    protected $jadwalModel;

    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
        $this->nilaiModel = new NilaiModel();
        $this->krsModel = new KrsModel();
        $this->mataKuliahModel = new MataKuliahModel();
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


    public function home()
    {
        // $mahasiswaId = session()->get('user_id');
        // $mahasiswa = $this->mahasiswaModel->getMahasiswaByUserId($mahasiswaId);
        // // dd($mahasiswaId);

        return view('mahasiswa/dashboard');
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

    public function edit($id)
    {
        $data['mahasiswa'] = $this->mahasiswaModel->find($id);
        return view('mahasiswa/edit', $data);
    }

    public function delete($id)
    {
        $this->mahasiswaModel->delete($id);
        return redirect()->to('/mahasiswa');
    }

    // untuk krs
    public function krs()
    {
        $mahasiswaId = session()->get('user_id');
        $data['krs'] = $this->krsModel
            ->select('krs.*, jadwal_perkuliahan.*, mata_kuliah.*')
            ->join('jadwal_perkuliahan', 'jadwal_perkuliahan.id = krs.jadwal_id')
            ->join('mata_kuliah', 'mata_kuliah.id = jadwal_perkuliahan.mata_kuliah_id')
            ->where('krs.mahasiswa_id', $mahasiswaId)
            ->findAll();

        return view('mahasiswa/krs/index', $data);
    }

}
