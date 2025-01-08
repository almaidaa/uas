<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Nilai Mahasiswa</h1>

        <h2>Jadwal Mata Kuliah</h2>
        <p><strong>Mata Kuliah:</strong> <?= $jadwal['mata_kuliah'] ?></p>
        <p><strong>Hari:</strong> <?= $jadwal['hari'] ?></p>
        <p><strong>Waktu:</strong> <?= $jadwal['jam_mulai'] ?> - <?= $jadwal['jam_selesai'] ?></p>

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
                            <!-- <a href="dosen/nilai/input_nillai" class="btn btn-primary mb-3">Lihat Jadwal</a> -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

    </div>
</body>

</html>