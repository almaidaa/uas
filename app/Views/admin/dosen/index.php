<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
         body {
            background: url("/img/bg-univ.jpg") no-repeat center center fixed;
           background-size: cover;
           position: relative;
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

        .shadow-custom{
            -webkit-box-shadow: -1px 1px 20px 3px rgba(128,121,128,1);
-moz-box-shadow: -1px 1px 20px 3px rgba(128,121,128,1);
box-shadow: -1px 1px 20px 3px rgba(128,121,128,1);
        }
        .custom-transparant{
            background-color: rgba(255,255,255,0.1);    
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(5px);
            /* cursor: pointer; */

        }
        table.custom-transparant tr{
            background-color: transparent;
        }
        table.custom-transparant th, table.custom-transparant td{
            background-color: transparent;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container mt-5 custom-transparant">
        <h1 style="text-align: center; font-weight: bold; text-shadow: 5px 5px 10px rgba(0,0,0,0.5);">Data Dosen</h1>
<div class="d-flex justify-content-between align-items-center mb-3" style="width: 95%;">
    <a href="/admin/dosen/create" class="btn btn-primary shadow-custom">Tambah Dosen</a>
    <div class="input-group" style="width: 350px;">
        <span class="input-group-text" id="basic-addon1">Search</span>
        <input type="text" class="form-control" id="search-bar" placeholder="Cari dosen" oninput="searchData()">
    </div>
</div>
        <table class="table table-bordered table-striped shadow-custom" id="table-dosen">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Departemen</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dosen as $key => $row): ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= esc($row['nip']) ?></td>
                        <td><?= esc($row['nama']) ?></td>
                        <td><?= esc($row['departemen']) ?></td>
                        <td>
                        <a href="/admin/dosen/edit/<?= $row['id'] ?>" class="btn btn-primary mb-2">Edit</a>
                        <a href="<?= site_url('/admin/dosen/index/delete/') . $row['id']?>" 
                        class="btn btn-danger mb-2" onclick="return confirm('apakah yakin ingin menghapus')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <script>
            document.getElementById('search-bar').addEventListener('keyup', function() {
                var searchValue = this.value.toLowerCase();
                var rows = document.querySelectorAll('#table-dosen tbody tr');
                rows.forEach(function(row) {
                    var showRow = Array.from(row.cells).some(function(cell) {
                        return cell.textContent.toLowerCase().includes(searchValue);
                    });
                    row.style.display = showRow ? '' : 'none';
                });
            });
        </script>
        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Kembali ke Dashboard" class="btn btn-outline-primary shadow my-3 btn-sm rounded-circle " href="<?= base_url('/dashboard') ?>"><i class="fa-solid fa-arrow-left"></i> </a>
    </div>
</body>

</html>
