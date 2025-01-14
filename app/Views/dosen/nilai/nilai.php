<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <style>
            .text-shadow {
                color: white;
                text-shadow: 2px 2px 4px black;
                text-align: center;
            }
        </style>
</head>

<body style="background-color:rgb(32, 32, 117);">
    <div class="container mt-5">
        <h1 class="text-shadow">Nilai Mahasiswa</h1>

        <h2 class="text-shadow">Jadwal Mata Kuliah</h2>
        <p class="text-shadow"><strong>Mata Kuliah:</strong> <?= $jadwal['mata_kuliah'] ?></p>
        <p class="text-shadow"><strong>Hari:</strong> <?= $jadwal['hari'] ?></p>
        <p class="text-shadow"><strong>Waktu:</strong> <?= $jadwal['jam_mulai'] ?> - <?= $jadwal['jam_selesai'] ?></p>

        <?php if (empty($nilai)): ?>
            <div class="alert alert-warning">
                Belum ada mahasiswa yang terdaftar pada mata kuliah ini.
            </div>
        <?php else: ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($nilai as $item): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $item['nim'] ?></td>
                            <td><?= $item['mahasiswa_nama'] ?></td>
                            <td><?= $item['nilai'] ?: '<a href="' . base_url('dosen/nilai/input_nilai/' . $jadwal['id'] . '/' . $item['id'])  . '" class="btn btn-primary mb-3">Penilaian</a>' ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Kembali ke Dashboard" class="btn btn-outline-primary shadow my-3 btn-sm rounded-circle " href="<?= base_url('/dashboard') ?>"><i class="fa-solid fa-arrow-left"></i> </a> 
        <?php endif; ?>

    </div>
</body>

</html>
