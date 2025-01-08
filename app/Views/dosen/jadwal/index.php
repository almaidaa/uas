<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css'); ?>">
</head>

<body>
    <div class="container mt-5">
        <h1><?= $title; ?></h1>

        <?php if (empty($jadwal)): ?>
            <div class="alert alert-info">Belum ada jadwal perkuliahan.</div>
        <?php else: ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Mata Kuliah</th>
                        <th>Ruangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($jadwal as $index => $row): ?>
                        <tr>
                            <td><?= $index + 1; ?></td>
                            <td><?= $row['hari']; ?></td>
                            <td><?= $row['jam_mulai']; ?> - <?= $row['jam_selesai']; ?></td>
                            <td><?= $row['nama_mata_kuliah']; ?> (<?= $row['kode_mata_kuliah']; ?>)</td>
                            <td><?= $row['ruangan']; ?></td>
                            <td>
                                <a href="<?= base_url('dosen/nilai/nilai/' . $row['id']) ?>" class="btn btn-primary">Lihat Nilai</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <script src="<?= base_url('js/bootstrap.bundle.min.js'); ?>"></script>
</body>

</html>