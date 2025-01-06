<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Nilai Saya</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Mata Kuliah</th>
                    <th>Dosen</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($nilai as $key => $row): ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= esc($row['mata_kuliah']) ?></td>
                        <td><?= esc($row['dosen']) ?></td>
                        <td><?= esc($row['nilai']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
