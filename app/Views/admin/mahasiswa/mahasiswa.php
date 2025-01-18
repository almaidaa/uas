<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <?php include('header.php'); ?>
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
</head>

<body class="gradient-custom">
    <div class="container mt-5 custom-transparant">
        <h1 style="text-align: center; font-weight: bold; text-shadow: 3px 3px 5px rgba(0,0,0,0.2);">Data Mahasiswa</h1>
        <div class="d-flex justify-content-between mb-3" style="width: 95%;">
            <a href="create" class="btn btn-primary shadow-custom">Tambah Mahasiswa</a>
            <div class="input-group" style="width: 350px;">
                <span class="input-group-text" id="basic-addon1">Search</span>
                <input type="text" class="form-control" id="search" placeholder="NIM, Nama, Jurusan, Angkatan" oninput="searchData()">
            </div>
        </div>
        <div style="display: flex; justify-content: center;">
            <table id="table" class="table table-hover table-bordered shadow-custom" style="width:95%; transition: all 0.3s ease; font-weight: normal; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);">
                <thead>
                    <tr style="text-align: center;">
                        <th style="text-align: center;">No</th>
                        <!-- <th style="text-align: center;">user id</th> -->
                        <th style="text-align: center;">NIM</th>
                        <th style="text-align: center;">Nama</th>
                        <th style="text-align: center;">Jurusan</th>
                        <th style="text-align: center;">Angkatan</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    <?php foreach ($mahasiswa as $key => $row): ?>
                        <tr style="text-align: center;">
                            <td style="text-align: center;"><?= $key + 1 ?></td>
                            <td><?= esc($row['nim']) ?></td>
                            <td><?= esc($row['nama']) ?></td>
                            <td><?= esc($row['jurusan']) ?></td>
                            <td><?= esc($row['angkatan']) ?></td>
                            <td style="text-align: center;"><a href="/admin/mahasiswa/edit/<?= $row['id'] ?>" class="btn btn-primary mb-2">Edit</a>
                            <a href="<?= site_url('/admin/mahasiswa/mahasiswa/delete/') . $row['id']?>" 
                            class="btn btn-danger mb-2" onclick="if(confirm('apakah yakin ingin menghapus')) { alert('Data berhasil dihapus'); return true; } else { return false; }">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Kembali ke Dashboard" class="btn btn-outline-primary shadow my-3 btn-sm rounded-circle " href="<?= base_url('/dashboard') ?>"><i class="fa-solid fa-arrow-left"></i> </a> 
        <script>
            function searchData() {
                var search = document.getElementById("search").value;
                var table = document.getElementById("table-body");
                var tr = table.getElementsByTagName("tr");
                for (var i = 0; i < tr.length; i++) {
                    var td = tr[i].getElementsByTagName("td");
                    for (var j = 0; j < td.length; j++) {
                        if (td[j].innerHTML.toLowerCase().indexOf(search.toLowerCase()) > -1) {
                            tr[i].style.display = "";
                            break;
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        </script>
    </div>
</body>

</html>
