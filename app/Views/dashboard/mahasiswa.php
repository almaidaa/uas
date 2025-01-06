<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Dashboard Mahasiswa</h1>
        <h3>Ringkasan Nilai:</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mata Kuliah</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($nilai as $row): ?>
                    <tr>
                        <td><?= esc($row['nama_mk']) ?></td>
                        <td><?= esc($row['nilai']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>