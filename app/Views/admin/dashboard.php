<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Dashboard Admin</h1>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5>Total Mahasiswa</h5>
                        <h2><?= $total_mahasiswa ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5>Total Dosen</h5>
                        <h2><?= $total_dosen ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5>Total Mata Kuliah</h5>
                        <h2><?= $total_mata_kuliah ?></h2>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5>Total Nilai</h5>
                        <h2><?= $total_nilai ?></h2>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <a href="/admin/mahasiswa/mahasiswa" class="btn btn-primary w-100 mb-3">Kelola Mahasiswa</a>
            </div>
            <div class="col-md-4">
                <a href="/admin/dosen/index" class="btn btn-primary w-100 mb-3">Kelola Dosen</a>
            </div>
            <div class="col-md-4">
                <a href="/admin/mata_kuliah/index" class="btn btn-primary w-100 mb-3">Kelola Mata Kuliah</a>
            </div>
            <div class="col-md-4">
                <a href="/admin/jadwal/index" class="btn btn-primary w-100 mb-3">Kelola Jadwal</a>
            </div>
            <div class="col-md-4">
                <a href="/admin/laporan" class="btn btn-primary w-100 mb-3">Laporan</a>
            </div>
            <div class="col-md-4">
                <a href="/admin/notifikasi" class="btn btn-primary w-100 mb-3">Kelola Notifikasi</a>
            </div>
        </div>
    </div>
</body>

</html>