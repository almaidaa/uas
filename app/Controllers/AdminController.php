<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use App\Models\DosenModel;
use App\Models\MataKuliahModel;
use App\Models\JadwalPerkuliahanModel;
use App\Models\UserModel;

class AdminController extends BaseController
{
    protected $mahasiswaModel;
    protected $nilaiModel;
    protected $dosenModel;
    protected $mataKuliahModel;
    protected $jadwalModel;
    protected $userModel;

    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
        $this->dosenModel = new DosenModel();
        $this->mataKuliahModel = new MataKuliahModel();
        $this->jadwalModel = new JadwalPerkuliahanModel();
        $this->userModel = new UserModel();
    }
    public function index()
    {
        return view('admin/dashboard');
    }

    public function manageMahasiswa() // Mahasiswa
    {
        $mahasiswaModel = new MahasiswaModel();
        $data['mahasiswa'] = $mahasiswaModel->findAll();
        return view('admin/mahasiswa/mahasiswa', $data);
    }

    public function createmhs() //Mahasiswa
    {
        return view('admin/mahasiswa/create');
    }

    public function storemhs() //mahasiswa
    {
        $this->mahasiswaModel->save([
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'jurusan' => $this->request->getPost('jurusan'),
            'angkatan' => $this->request->getPost('angkatan'),
        ]);

        return redirect()->to('/admin/mahasiswa/mahasiswa');
    }

    public function manageDosen()
    {
        $data = [
            'title' => 'Daftar Dosen',
            'dosen' => $this->dosenModel->getAllDosenWithUser(),
        ];
        return view('admin/dosen/index', $data);
    }

    public function createdosen()
    {
        $data = [
            'title' => 'Tambah Dosen',
            'validation' => \Config\Services::validation(),
        ];
        return view('/admin/dosen/create');
    }

    public function storedosen()
    {
        // Validasi input
        if (!$this->validate([
            'nip'     => 'required|is_unique[dosen.nip]|max_length[15]',
            'nama'    => 'required|min_length[3]|max_length[100]',
            'departemen'  => 'required|min_length[3]|max_length[100]',
        ])) {
            return redirect()->to('admin/dosen/create')->withInput()->with('validation', \Config\Services::validation());
        }

        // Ambil data dari input
        $dataDosen = [
            'nip' => $this->request->getVar('nip'),
            'nama' => $this->request->getVar('nama'),
            'departemen' => $this->request->getVar('departemen'),
        ];

        // Tambahkan dosen beserta user
        if ($this->dosenModel->createDosenWithUser($dataDosen)) {
            return redirect()->to('admin/dosen/index')->with('success', 'Dosen berhasil ditambahkan.');
        } else {
            return redirect()->to('admin/dosen/create')->with('error', 'Gagal menambahkan dosen.');
        }
    }

    public function manageMataKuliah()
    {
        $mataKuliahModel = new MataKuliahModel();
        $data['mata_kuliah'] = $mataKuliahModel->findAll();
        return view('admin/mata_kuliah/index', $data);
    }

    public function createmk()
    {
        $users = $this->userModel->where('role', 'dosen')->findAll();
        return view('admin/mata_kuliah/create', [
            'users' => $users, // Variabel yang dikirim ke view
        ]);
    }

    public function storemk()
    {
        $this->mataKuliahModel->save([
            'kode_mk' => $this->request->getPost('kode_mk'),
            'nama_mk' => $this->request->getPost('nama_mk'),
            'sks' => $this->request->getPost('sks'),
            'semester' => $this->request->getPost('semester'),
            'dosen_id' => $this->request->getPost('dosen_id'),
        ]);

        return redirect()->to('admin/mata_kuliah/index');
    }

    public function manageJadwal()
    {
        $data['jadwal'] = $this->jadwalModel
            ->select('jadwal_perkuliahan.*, mata_kuliah.nama_mk, dosen.nama as dosen')
            ->join('mata_kuliah', 'mata_kuliah.id = jadwal_perkuliahan.mata_kuliah_id')
            ->join('dosen', 'dosen.id = jadwal_perkuliahan.dosen_id')
            ->findAll();

        return view('admin/jadwal/index', $data);
    }

    public function createjdwl()
    {
        $data = [
            'mata_kuliah' => $this->mataKuliahModel->findAll(),
            'dosen'       => $this->dosenModel->findAll(),
        ];

        return view('admin/jadwal/create', $data);
    }

    public function storejdwl()
    {
        $this->jadwalModel->save([
            'mata_kuliah_id' => $this->request->getPost('mata_kuliah_id'),
            'dosen_id'       => $this->request->getPost('dosen_id'),
            'hari'           => $this->request->getPost('hari'),
            'jam_mulai'      => $this->request->getPost('jam_mulai'),
            'jam_selesai'    => $this->request->getPost('jam_selesai'),
            'ruangan'        => $this->request->getPost('ruangan'),
        ]);

        return redirect()->to('admin/jadwal/index');
    }

    public function laporan()
    {
        // Implementasi laporan
        return view('admin/laporan');
    }

    public function manageNotifikasi()
    {
        // Implementasi notifikasi
        return view('admin/notifikasi');
    }
}
