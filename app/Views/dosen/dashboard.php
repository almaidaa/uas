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


    <div style="display: flex; justify-content: center; align-items: center;">
        <h1 style="margin: 20px;">Selamat Datang, <?= $dosen['nama'] ?>!</h1>
    </div>
    
    <div class="container mt-5">
        <h1>Data Dosen</h1>
        <a href="dosen/jadwal/index" class="btn btn-primary mb-3">Lihat Jadwal</a>
        <a href="/logout" class="btn btn-danger mb-3">Log Out</a>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Departemen</th>
                    <th>Mata Kuliah Yang Diajar</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td><?= $dosen['nama']; ?></td>
                        <td><?= $dosen['nip']; ?></td>
                        <td><?= $dosen['departemen']; ?></td>
                        <td><?php if (empty($mata_Kuliah)): ?>
            <p>Tidak ada mata kuliah yang diajar.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($jadwal_perkuliahan as $mk): ?>
                    <li><?= $mk['kode_mata_kuliah'] ?> - <?= $mk['nama_mata_kuliah'] ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?></td>
                    </tr>
            </tbody>
        </table>
    </div>
</body>

</html>


