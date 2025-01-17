<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Jadwal Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <style>

        /* Container with a fresh layout */
        .container {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 50px;
            margin-top: 50px;
            max-width: 950px;
            text-align: center;
        }

        /* Main title styling */
        h1 {
            font-size: 38px;
            color: #34495e;
            font-weight: 600;
            margin-bottom: 30px;
        }

        /* Mata Kuliah name */
        h2 {
            font-size: 28px;
            font-weight: bold;
            color: #2ecc71;
            margin-bottom: 20px;
        }

        /* Subheading */
        h3 {
            font-size: 24px;
            color: #7f8c8d;
            margin-top: 40px;
            margin-bottom: 20px;
        }

        /* Paragraph styling */
        p {
            font-size: 18px;
            color: #2c3e50;
            margin-bottom: 15px;
        }

        .table th,
        .table td {
            padding: 16px;
            text-align: center;
        }

        /* Table header background */
        .table thead {
            background-color: #f7f7f7;
        }

        .table-bordered {
            border: 1px solid #ddd;
        }

        /* Form input fields */
        .form-group label {
            font-weight: 600;
            color: #34495e;
            margin-bottom: 8px;
        }

        .form-control {
            border-radius: 10px;
            padding: 14px;
            font-size: 16px;
            border: 1px solid #dfe4ea;
            background-color: #f1f4f8;
            margin-bottom: 20px;
        }

        .form-control:focus {
            border-color: #2ecc71;
            box-shadow: 0 0 8px rgba(46, 204, 113, 0.5);
        }

        /* Primary button styling */
        .btn-primary {
            background-color: #2ecc71;
            border-color: #2ecc71;
            padding: 14px 25px;
            font-size: 18px;
            font-weight: 500;
            border-radius: 10px;
            transition: all 0.3s ease;
            margin-top: 15px;
        }

        .btn-primary:hover {
            background-color: #27ae60;
            border-color: #27ae60;
            cursor: pointer;
        }

        /* Secondary (Back) button styling */
        .btn-secondary {
            background-color: #95a5a6;
            border-color: #95a5a6;
            padding: 14px 25px;
            font-size: 18px;
            font-weight: 500;
            border-radius: 10px;
            transition: all 0.3s ease;
            margin-top: 15px;
        }

        .btn-secondary:hover {
            background-color: #7f8c8d;
            border-color: #7f8c8d;
            cursor: pointer;
        }

        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
            font-weight: 500;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .jadwal-info {
                margin-bottom: 20px;
            }

            .jadwal-info h2 {
                font-weight: 700;
                margin-bottom: 10px;
            }

            .jadwal-info ul {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .jadwal-info li {
                margin-bottom: 10px;
            }

            .jadwal-info li strong {
                font-weight: 700;
            }
    </style>
</head>

<body class="gradient-custom">
    <div class="container">
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>
        <h1 style="font-family: 'Roboto', sans-serif; color: black; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);">Detail Jadwal Mata Kuliah</h1>

        <!-- Mata Kuliah Section -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th colspan="2"><?= $jadwal['mata_kuliah'] ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Dosen</strong></td>
                    <td><?= $jadwal['nama'] ?></td>
                </tr>
                <tr>
                    <td><strong>Hari</strong></td>
                    <td><?= $jadwal['hari'] ?></td>
                </tr>
                <tr>
                    <td><strong>Waktu</strong></td>
                    <td><?= $jadwal['jam_mulai'] ?> - <?= $jadwal['jam_selesai'] ?></td>
                </tr>
            </tbody>
        </table>

        <!-- Mahasiswa Section -->
        <h3 style="color: black; text-shadow: 2px 2px 5px rgba(0,0,0,0.3);">Mahasiswa</h3>
        <!-- Search bar -->
                <div class="d-flex justify-content-between align-items-center mb-3" style="width: 100%;">
                    <input type="text" class="form-control" style="font-weight: bold;" id="search-bar" placeholder="Cari Mahasiswa" oninput="searchTable()">
                </div>

        <?php if (!empty($mahasiswa)): ?>
            <table id="data-table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($mahasiswa as $mhs): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $mhs['nim'] ?></td>
                            <td><?= $mhs['nama'] ?></td>
                            <td>
                                <form action="<?= base_url('admin/jadwal/detail_jadwal/hapus/' . $mhs['id'] . '/' . $jadwal['id']) ?>" method="post" onsubmit="return confirm('Apakah yakin ingin menghapus mahasiswa <?=  $mhs['id'] . '/' . $jadwal['id'] ?> dari jadwal ini?')">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Belum ada mahasiswa yang terdaftar pada jadwal ini.</p>
        <?php endif; ?>

        <!-- Form for adding mahasiswa -->
        <h3 style="color: black;">Tambah Mahasiswa ke Jadwal</h3>
        <form action="<?= base_url('admin/jadwal/detail_jadwal/tambah') ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="jadwal_id" value="<?= $jadwal['id'] ?>">
            <div class="form-group">
                <label for="mahasiswa_id" style="color: black;">Pilih Mahasiswa:</label>
                <select name="mahasiswa_id" id="mahasiswa_id" class="form-control">
                    <option value="">Pilih Mahasiswa</option>
                    <?php foreach ($allMahasiswa as $mhs): ?>
                        <option value="<?= $mhs['id'] ?>"><?= $mhs['nim'] ?> - <?= $mhs['nama'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Mahasiswa</button>
            <a href="<?= base_url('/admin/jadwal/index') ?>" class="btn btn-secondary">Kembali ke Jadwal</a>
        </form>

        <!-- Kembali Button -->
    </div>
</body>

<script>
    $(document).ready(function() {
        $('#data-table').DataTable({
            "order": [[1, 'asc']]
        });
    });

    function searchTable() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("search-bar");
                filter = input.value.toUpperCase();
                table = document.getElementById("data-table");
                tr = table.getElementsByTagName("tr");

                for (i = 0; i < tr.length; i++) {
                    tdNim = tr[i].getElementsByTagName("td")[1]; // NIM column
                    tdNama = tr[i].getElementsByTagName("td")[2]; // Nama column
                    if (tdNim && tdNama) {
                        txtValueNim = tdNim.textContent || tdNim.innerText;
                        txtValueNama = tdNama.textContent || tdNama.innerText;
                        if (
                            txtValueNim.toUpperCase().indexOf(filter) > -1 ||
                            txtValueNama.toUpperCase().indexOf(filter) > -1
                        ) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }       
                }
            }
</script>

</html>
