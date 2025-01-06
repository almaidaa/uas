<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Perkuliahan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Jadwal Perkuliahan</h1>
        <a href="create" class="btn btn-primary mb-3">Tambah Jadwal</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Mata Kuliah</th>
                    <th>Dosen</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Ruangan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jadwal as $key => $row): ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= esc($row['nama_mk']) ?></td>
                        <td><?= esc($row['dosen']) ?></td>
                        <td><?= esc($row['hari']) ?></td>
                        <td><?= esc($row['jam_mulai']) ?> - <?= esc($row['jam_selesai']) ?></td>
                        <td><?= esc($row['ruangan']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>