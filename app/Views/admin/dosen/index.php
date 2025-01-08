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
        <h1>Data Dosen</h1>
        <a href="/admin/dosen/create" class="btn btn-primary mb-3">Tambah Dosen</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dosen as $key => $row): ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= esc($row['nip']) ?></td>
                        <td><?= esc($row['nama']) ?></td>
                        <td><?= esc($row['departemen']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>