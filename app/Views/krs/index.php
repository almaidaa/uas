<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Kartu Rencana Studi</h1>
        <a href="/krs/create" class="btn btn-primary mb-3">Tambah Mata Kuliah</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Mata Kuliah</th>
                    <th>Semester</th>
                    <th>Jadwal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($krs as $key => $row): ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= esc($row['nama_mk']) ?></td>
                        <td><?= esc($row['semester']) ?></td>
                        <td>
                            <?= esc($row['hari']) ?>, <?= esc($row['jam_mulai']) ?> - <?= esc($row['jam_selesai']) ?><br>
                            Ruang: <?= esc($row['ruangan']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>
</body>

</html>