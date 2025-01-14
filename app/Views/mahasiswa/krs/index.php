<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .custom-shadow {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body style="background-color:rgb(30, 60, 101);">
    <div class="container mt-5 custom-shadow rounded-3 p-3">
        <h1 class="text-center text-white" style="text-shadow: 3px 3px 5px rgb(0, 0, 0);">Kartu Rencana Studi</h1>
        <table class="table table-bordered table-striped table-hover custom-shadow">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Mata Kuliah</th>
                    <th>Dosen</th>
                    <th>Semester</th>
                    <th>Jadwal</th>
                </tr>
                <a href="/dashboard" class="btn btn-primary mb-3">Kembali ke Dashboard</a>
            </thead>
            <tbody>
                <?php foreach ($krs as $key => $row): ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= esc($row['nama_mk']) ?></td>
                        <td><?= esc($row['nama_dosen']) ?></td>
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

