<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use App\Models\DosenModel;
use App\Models\MataKuliahModel;
use App\Models\JadwalPerkuliahanModel;
use App\Models\UserModel;
// use App\Models\KrsModel;
use App\Models\KRSModel;
// use App\Models\MahasiswaModel;
// use App\Models\JadwalModel;

class AdminController extends BaseController
{
    protected $mahasiswaModel;
    protected $nilaiModel;
    protected $dosenModel;
    protected $mataKuliahModel;
    protected $jadwalModel;
    protected $userModel;
    protected $krsModel;

    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
        $this->dosenModel = new DosenModel();
        $this->mataKuliahModel = new MataKuliahModel();
        $this->jadwalModel = new JadwalPerkuliahanModel();
        $this->userModel = new UserModel();
        $this->krsModel = new KrsModel();
    }
    public function index()
    {
        return view('admin/dashboard');
    }

    public function manageMahasiswa() // Mahasiswa
    {
        $data = [
            'title' => 'Daftar mahasiswa',
            'mahasiswa' => $this->mahasiswaModel->getAllMahasiswaWithUser(),
        ];
        return view('admin/mahasiswa/mahasiswa', $data);
    }

    public function createmhs() //Mahasiswa
    {   
        $data = [
            'title' => 'Tambah Mahasiswa',
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/mahasiswa/create', $data);
    }

    public function storemhs() //mahasiswa
    {
       // Validasi input
       if (!$this->validate([
        'nim'     => 'required|is_unique[mahasiswa.nim]|max_length[15]',
        'nama'    => 'required|min_length[3]|max_length[100]',
        'jurusan'  => 'required|min_length[3]|max_length[100]',
        'angkatan'  => 'required|numeric',
    ])) {
        return redirect()->to('admin/mahasiswa/create')->withInput()->with('validation', \Config\Services::validation());
    }

    // Ambil data dari input
    $dataMahasiswa = [
        'nim' => $this->request->getVar('nim'),
        'nama' => $this->request->getVar('nama'),
        'jurusan' => $this->request->getVar('jurusan'),
        'angkatan' => $this->request->getVar('angkatan'),
    ];

    // Tambahkan dosen beserta user
    if ($this->mahasiswaModel->createMahasiswaWithUser($dataMahasiswa)) {
        return redirect()->to('admin/mahasiswa/mahasiswa')->with('success', 'Dosen berhasil ditambahkan.');
    } else {
        return redirect()->to('admin/mahasiswa/create')->with('error', 'Gagal menambahkan dosen.');
    }
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
        $dosen = $this->userModel->where('role', 'dosen')->findAll();
        return view('admin/mata_kuliah/create', [
            'dosen' => $dosen, // Variabel yang dikirim ke view
        ]);
    }

    public function storemk()
    {
        $data = [
            'kode_mk' => $this->request->getPost('kode_mk'),
            'nama_mk' => $this->request->getPost('nama_mk'),
            'sks' => $this->request->getPost('sks'),
            'semester' => $this->request->getPost('semester'),
            'dosen_id' => $this->request->getPost('dosen_id'),
        ];
        // Debug untuk memeriksa data dosen_id
        // dd($data);
        if ($this->mataKuliahModel->insert($data)) {
            return redirect()->to('admin/mata_kuliah/index')->with('success', 'Mata kuliah berhasil ditambahkan.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan mata kuliah.');
        }

        // return redirect()->to('admin/mata_kuliah/index');
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

    public function detailJadwal($jadwalId)
    {
        $mahasiswa    = $this->krsModel->getMahasiswaByJadwal($jadwalId);
        $allMahasiswaNotRegistered = $this->mahasiswaModel
            ->select('*')
            ->whereNotIn('mahasiswa.id', function($builder) {
                return $builder->select('mahasiswa_id')->from('krs');
            })
            ->findAll();


        $jadwal = $this->jadwalModel
            ->select('jadwal_perkuliahan.id, mata_kuliah.nama_mk as mata_kuliah, jadwal_perkuliahan.hari, jadwal_perkuliahan.jam_mulai, jadwal_perkuliahan.jam_selesai')
            ->join('mata_kuliah', 'mata_kuliah.id = jadwal_perkuliahan.mata_kuliah_id')
            ->find($jadwalId);

        if (!$jadwal) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Jadwal tidak ditemukan.');
        }

        return view('admin/jadwal/detail_jadwal', [
            'jadwal' => $jadwal,
            'mahasiswa' => $mahasiswa,
            'allMahasiswa' => $allMahasiswaNotRegistered,
        ]);
    }

    public function tambahMahasiswaKeJadwal()
    {
        $jadwalId = $this->request->getPost('jadwal_id');
        $mahasiswaId = $this->request->getPost('mahasiswa_id');

        if (!$jadwalId || !$mahasiswaId) {
            return redirect()->back()->with('error', 'Data tidak lengkap.');
        }

        // Cek apakah mahasiswa sudah terdaftar di jadwal ini
        $existing = $this->krsModel->where('jadwal_id', $jadwalId)
            ->where('mahasiswa_id', $mahasiswaId)
            ->first();

        // dd($existing);
        $mkid = $this->jadwalModel->find($jadwalId)['mata_kuliah_id'];
        // dd($mkid);
        $semester = $this->mataKuliahModel->find($mkid)['semester'];
        // dd($semester);
        if ($existing) {
            return redirect()->back()->with('error', 'Mahasiswa sudah terdaftar di jadwal ini.');
        }

        // Tambahkan mahasiswa ke KRS
        $this->krsModel->insert([
            'jadwal_id' => $jadwalId,
            'semester' => $semester,
            'mata_kuliah_id' => $mkid,
            'mahasiswa_id' => $mahasiswaId,
        ]);

        return redirect()->back()->with('success', 'Mahasiswa berhasil ditambahkan.');
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
