<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Perkuliahan</title>
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    

    <style>
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

<body class="gradient-custom">
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
    <div class="container mt-5">
        <h1>Jadwal Perkuliahan</h1>
<div class="d-flex justify-content-between align-items-center mb-3" style="width: 95%;">
<a href="create" class="btn btn-primary shadow-custom">Tambah Jadwal</a>
<!-- <a href="/dashboard" class="btn btn-primary mb-3">Dashboard</a> -->
<div class="input-group" style="width: 350px;">
    <span class="input-group-text" id="basic-addon1">Search</span>
    <input type="text" class="form-control" id="search-bar" placeholder="Cari Jadwal" oninput="searchData()">
</div>
</div>
        <table class="table table-bordered data-table" id="table-jadwal">
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
        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Kembali ke Dashboard" class="btn btn-outline-primary shadow my-3 btn-sm rounded-circle " href="<?= base_url('/dashboard') ?>"><i class="fa-solid fa-arrow-left"></i> </a>
    </div>
<script>
    document.getElementById('search-bar').addEventListener('keyup', function() {
        var searchValue = this.value.toLowerCase();
        var rows = document.querySelectorAll('#table-jadwal tbody tr');
        rows.forEach(function(row) {
            var showRow = Array.from(row.cells).some(function(cell) {
                return cell.textContent.toLowerCase().includes(searchValue);
            });
            row.style.display = showRow ? '' : 'none';
        });
    });
</script>
</body>

</html>
