<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Perkuliahan</title>
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
        <h1>Jadwal Perkuliahan</h1>
<div class="mb-3">

<?php if(session()->getFlashdata('message')): ?>
    <div class="alert alert-success" role="alert">
       <?= session()->getFlashdata('message') ?>
    </div>
<?php endif; ?>

<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger" role="alert">
       <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>


<a href="create" class="btn btn-primary mb-3">Tambah Jadwal</a>
<a href="/dashboard" class="btn btn-primary mb-3">Dashboard</a>
</div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Mata Kuliah</th>
                    <th>Dosen</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Ruangan</th>
                    <th>Semester</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jadwal as $key => $row): ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= esc($row['nama_mk']) ?></td>
                        <td><?= esc($row['dosen']) ?></td>
                        <td><?= esc($row['hari']) ?></td>
                        <td><?= esc($row['jam_mulai']) ?> - <?= esc($row['jam_selesai']) ?></td>
                        <td><?= esc($row['ruangan']) ?></td>
                        <td><?= esc($row['semester']) ?></td>
                        <td>
                            <a href="<?= base_url('admin/jadwal/detail_jadwal/' . $row['id']) ?>" class="btn btn-info mb-2">Detail</a>
                            <a href="/admin/jadwal/edit/<?= $row['id'] ?>" class="btn btn-primary mb-2">Edit</a>
                            <a href="<?= site_url('/admin/jadwal/index/delete/') . $row['id']?>" 
                            class="btn btn-danger mb-2" onclick="return confirm('apakah yakin ingin menghapus')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>