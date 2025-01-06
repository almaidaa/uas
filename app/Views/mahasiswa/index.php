<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Data Mahasiswa</h1>
        <!-- <a href="/mahasiswa/create" class="btn btn-primary mb-3">Tambah Mahasiswa</a> -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Angkatan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mahasiswa as $key => $row): ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= esc($row['nim']) ?></td>
                        <td><?= esc($row['nama']) ?></td>
                        <td><?= esc($row['jurusan']) ?></td>
                        <td><?= esc($row['angkatan']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>