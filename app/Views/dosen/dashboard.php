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
        <a href="dosen/jadwal/index" class="btn btn-primary mb-3">Lihat Jadwal</a>
        <h1>Data Dosen</h1>
        <!-- <a href="/dosen/create" class="btn btn-primary mb-3">Tambah Dosen</a> -->
        <h2><?= $dosen['nama']; ?></h2>
        <p>NIP: <?= $dosen['nip']; ?></p>
        <p>Departemen: <?= $dosen['departemen']; ?></p>

        <h3>Mata Kuliah yang Diampu:</h3>
        <?php if (empty($mata_Kuliah)): ?>
            <p>Tidak ada mata kuliah yang diampu.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($mata_Kuliah as $mk): ?>
                    <li><?= $mk['kode_mata_kuliah'] ?> - <?= $mk['nama_mata_kuliah'] ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</body>

</html>