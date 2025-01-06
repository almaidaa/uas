<?php

namespace App\Controllers;

use App\Models\DosenModel;
use App\Models\UserModel;
use App\Models\MataKuliahModel;
use App\Models\JadwalPerkuliahanModel;
use App\Models\KrsModel;

class DosenController extends BaseController
{
    protected $dosenModel;
    protected $userModel;
    protected $mataKuliahModel;
    protected $krsModel;
    protected $jadwalModel;

    public function __construct()
    {
        $this->dosenModel = new DosenModel();
        $this->userModel = new UserModel();
        $this->krsModel = new KrsModel();
        $this->mataKuliahModel = new MataKuliahModel();
        $this->jadwalModel = new JadwalPerkuliahanModel();
    }

    public function index() //menampilkan dosen
    {
        return view('dosen/dashboard');
    }

    public function jadwal() //menampilkan dosen
    {
        $dosenId = session()->get('user_id'); // Ambil ID dosen dari session

        // Pastikan session dosen mengarah ke tabel dosen
        $dosen = $this->dosenModel->where('user_id', $dosenId)->first();
        if (!$dosen) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Dosen tidak ditemukan');
        }

        $jadwal = $this->jadwalModel->getJadwalByDosen($dosen['id']);

        $data = [
            'title' => 'Jadwal Perkuliahan Dosen',
            'jadwal' => $jadwal,
        ];

        // $jadwal = $this->jadwalModel->getJadwalByDosen($dosenId);
        // echo "<pre>";
        // print_r($jadwal);
        // echo "</pre>";
        // die();


        return view('dosen/jadwal/index',  $data);
    }

    public function lihatNilai($mataKuliahId)
    {
        // Cek apakah dosen memiliki mata kuliah ini
        $mataKuliah = $this->mataKuliahModel
            ->where('id', $mataKuliahId)
            ->where('dosen_id', session()->get('user_id'))
            ->first();

        if (!$mataKuliah) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Mata Kuliah tidak ditemukan atau bukan milik Anda.');
        }

        // Ambil daftar mahasiswa dengan nilai
        $mahasiswaKrs = $this->krsModel
            ->select('krs.*, mahasiswa.nama as nama_mahasiswa')
            ->join('mahasiswa', 'krs.mahasiswa_id = mahasiswa.id')
            ->where('mata_kuliah_id', $mataKuliahId)
            ->findAll();

        $data = [
            'title' => 'Lihat Nilai',
            'mataKuliah' => $mataKuliah,
            'mahasiswaKrs' => $mahasiswaKrs,
        ];

        return view('dosen/nilai', $data);
    }

    public function inputNilai($mataKuliahId)
    {
        // Cek apakah dosen memiliki mata kuliah ini
        $mataKuliah = $this->mataKuliahModel
            ->where('id', $mataKuliahId)
            ->where('dosen_id', session()->get('user_id'))
            ->first();

        if (!$mataKuliah) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Mata Kuliah tidak ditemukan atau bukan milik Anda.');
        }

        // Ambil daftar mahasiswa yang terdaftar di mata kuliah ini
        $mahasiswaKrs = $this->krsModel
            ->select('krs.*, mahasiswa.nama as nama_mahasiswa')
            ->join('mahasiswa', 'krs.mahasiswa_id = mahasiswa.id')
            ->where('mata_kuliah_id', $mataKuliahId)
            ->findAll();

        if ($this->request->getMethod() === 'post') {
            // Validasi dan simpan nilai yang diinput
            $nilaiData = $this->request->getPost('nilai');
            $allowedGrades = ['A', 'B', 'C', 'D', 'E'];

            foreach ($nilaiData as $krsId => $nilai) {
                if (!in_array($nilai, $allowedGrades)) {
                    return redirect()->back()->with('error', 'Nilai harus berupa huruf: A, B, C, D, atau E.');
                }
                $this->krsModel->update($krsId, ['nilai' => $nilai]);
            }

            return redirect()->to('/dosen/nilai/' . $mataKuliahId)->with('success', 'Nilai berhasil disimpan.');
        }

        $data = [
            'title' => 'Input Nilai',
            'mataKuliah' => $mataKuliah,
            'mahasiswaKrs' => $mahasiswaKrs,
        ];

        return view('dosen/input_nilai', $data);
    }



    // public function detail($id)
    // {
    //     $dosen = $this->dosenModel->find($id);
    //     $mataKuliah = $this->dosenModel->getMataKuliahByDosen($id);

    //     if (!$dosen) {
    //         throw new \CodeIgniter\Exceptions\PageNotFoundException('Dosen tidak ditemukan');
    //     }

    //     $data = [
    //         'title' => 'Detail Dosen',
    //         'dosen' => $dosen,
    //         'mata_Kuliah' => $mataKuliah,
    //     ];

    //     return view('dosen/detail', $data);
    // }
}
