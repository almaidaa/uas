<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <style>
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body class="gradient-custom">
    <div class="container mt-5" style="background-color: rgba(51, 51, 51, 0.5); color: white; backdrop-filter: blur(10px); box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);">
        <h1 class="text-center" style="color: black; font-weight: bold; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);">Daftar Mata Kuliah</h1>
        <div class="d-flex justify-content-between align-items-center mb-3" style="width: 95%;">
            <a href="create" class="btn btn-primary shadow-custom">Tambah Mata Kuliah</a>
            <div class="input-group" style="width: 350px;">
                <span class="input-group-text" id="basic-addon1">Search</span>
                <input type="text" class="form-control" id="search-bar" placeholder="Cari mata kuliah" oninput="searchData()">
            </div>
        </div>
        <table id="table-mata-kuliah" class="table table-bordered table-striped shadow-custom" style="width:100%">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Mata Kuliah</th>
                    <th scope="col">Nama Mata Kuliah</th>
                    <th scope="col">SKS</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mata_kuliah as $mk => $row): ?>
                    <tr>
                        <th scope="row"><?= $mk + 1 ?></th>
                        <td><?= esc($row['kode_mk']) ?></td>
                        <td><?= esc($row['nama_mk']) ?></td>
                        <td><?= esc($row['sks']) ?></td>
                        <td><?= esc($row['semester']) ?></td>
                        <td>
                            <div class="d-inline">
                                <a href="/admin/mata_kuliah/edit/<?= $row['id'] ?>" class="btn btn-primary mb-2">Edit</a>
                                <a href="<?= site_url('/admin/mata_kuliah/index/delete/') . $row['id'] ?>" class="btn btn-danger mb-2" onclick="return confirm('apakah yakin ingin menghapus')">Hapus</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Kembali ke Dashboard" class="btn btn-outline-primary shadow my-3 btn-sm rounded-circle " href="<?= base_url('/dashboard') ?>"><i class="fa-solid fa-arrow-left"></i> </a>
        <script>
            $(document).ready(function() {
                $('#table-mata-kuliah').DataTable({
                    "searching": true,
                    "paging": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                    "scrollX": true,
                    "scrollY": true,
                    "pageLength": 10
                });
            });

            function searchData() {
                var searchValue = document.getElementById('search-bar').value.toLowerCase();
                var rows = document.querySelectorAll('#table-mata-kuliah tbody tr');
                rows.forEach(function(row) {
                    var showRow = Array.from(row.cells).some(function(cell) {
                        return cell.textContent.toLowerCase().includes(searchValue);
                    });
                    row.style.display = showRow ? '' : 'none';
                });
            }
        </script>
    </div>
</body>

</html>

