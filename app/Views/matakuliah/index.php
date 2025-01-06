<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Mata Kuliah</h1>
        <a href="/matakuliah/create" class="btn btn-primary mb-3">Tambah MK</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Mata Kuliah</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Semester</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mata_kuliah as $mk => $row): ?>
                    <tr>
                        <td><?= $mk + 1 ?></td>
                        <td><?= esc($row['kode_mk']) ?></td>
                        <td><?= esc($row['nama_mk']) ?></td>
                        <td><?= esc($row['sks']) ?></td>
                        <td><?= esc($row['semester']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
