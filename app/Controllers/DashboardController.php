<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use App\Models\DosenModel;
use App\Models\MataKuliahModel;
use App\Models\NilaiModel;

class DashboardController extends BaseController
{
    protected $mahasiswaModel;
    protected $dosenModel;
    protected $mataKuliahModel;
    protected $nilaiModel;



    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
        $this->dosenModel = new DosenModel();
        $this->mataKuliahModel = new MataKuliahModel();
        $this->nilaiModel = new NilaiModel();
    }

    public function index()
    {
        $role = session()->get('role');

        if ($role == 'admin') {
            // dd($role);
            return $this->adminDashboard();
        } elseif ($role == 'dosen') {

            return $this->dosenDashboard();
            // return $this->dosenDashboard();
        } elseif ($role == 'mahasiswa') {
            // dd($role);
            return $this->mahasiswaDashboard();
        }

        return redirect()->to('/login')->with('error', 'Role tidak dikenali.');
    }

    private function adminDashboard()
    {
        $data = [
            'total_mahasiswa' => $this->mahasiswaModel->countAll(),
            'total_dosen' => $this->dosenModel->countAll(),
            'total_mata_kuliah' => $this->mataKuliahModel->countAll(),
            'total_nilai' => $this->nilaiModel->countAll(),
        ];

        return view('admin/dashboard', $data);
    }

    private function dosenDashboard()
    {
        $id         = session()->get('user_id');
        $role       = session()->get('role');
        $dosen      = $this->dosenModel->where('user_id', $id)->first();
        $mata_Kuliah = $this->dosenModel->getMataKuliahByDosen($dosen['user_id']);
        // dd($mataKuliah);

        if (!$dosen) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Dosen tidak ditemukan');
        }

        $data = [
            'title' => 'Detail Dosen',
            'dosen' => $dosen,
            'mata_Kuliah' => $mata_Kuliah,
        ];

        return view('dosen/dashboard', $data);
    }

    private function mahasiswaDashboard()
    {
        $mahasiswaId = session()->get('user_id');
        $mahasiswa = $this->mahasiswaModel->getMahasiswaByUserId($mahasiswaId);
        // dd($mahasiswaId);

        return view('mahasiswa/dashboard', ['mahasiswa' => $mahasiswa]);
    }
}
