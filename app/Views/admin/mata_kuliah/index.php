<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mata Kuliah</title>
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Daftar Mata Kuliah</h1>
        <div class="mb-3">
            <a href="create" class="btn btn-primary">Tambah Mata Kuliah</a>
            <a href="/dashboard" class="btn btn-primary">Dashboard</a>
            <!-- <a href="edit" class="btn btn-primary">Edit</a> -->
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Mata Kuliah</th>
                    <th>Nama Mata Kuliah</th>
                    <!-- <th>Nama Dosen</th> -->
                    <th>SKS</th>
                    <th>Semester</th>
                    <th>Aksi</th>
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
                        <td>
                            <div class="d-inline">
                            <a href="/admin/mata_kuliah/edit/<?= $row['id'] ?>" class="btn btn-primary mb-2">Edit</a>
                            <a href="<?= site_url('/admin/mata_kuliah/index/delete/') . $row['id']?>" class="btn btn-danger mb-2" onclick="return confirm('apakah yakin ingin menghapus')">Hapus</a>
                        </div>
                    </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>


