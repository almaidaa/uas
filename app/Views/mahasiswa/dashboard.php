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
        <a href="mahasiswa/krs/index" class="btn btn-primary mb-3">KRS</a>
        <!-- <th>No</th> -->
        <p><strong>Nama:</strong> <?= $mahasiswa['nama'] ?></p>
        <p><strong>NIM:</strong> <?= $mahasiswa['nim'] ?></p>
        <p><strong>Jurusan:</strong> <?= $mahasiswa['jurusan'] ?></p>
        <p><strong>Angkatan:</strong> <?= $mahasiswa['angkatan'] ?></p>
    </div>
</body>

</html>