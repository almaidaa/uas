<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color:  #295F98;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.2);
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1>Data Mahasiswa</h1>
        <a href="create" class="btn btn-primary mb-3">Tambah Mahasiswa</a>
        
        <a href="/dashboard" class="btn btn-primary mb-3">Dashboard</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <!-- <th>user id</th> -->
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Angkatan</th>
                    <th>Aksi</th>
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
                        <td><a href="/admin/mahasiswa/edit/<?= $row['id'] ?>" class="btn btn-primary mb-2">Edit</a>
                        <a href="<?= site_url('/admin/mahasiswa/mahasiswa/delete/') . $row['id']?>" 
                        class="btn btn-danger mb-2" onclick="return confirm('apakah yakin ingin menghapus')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
