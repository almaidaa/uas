<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        /* Custom Styling */
        body {
            background-color:#295F98;
            font-family: "Schibsted Grotesk", serif;
        }

        h1 {
            text-align: center;
            font-size: 36px;
            color: #2c3e50;
            margin-bottom: 30px;
        }

        /* .table-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 40px;
        }

        .table {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 1000px; /* Optional: Set a maximum width for the table */
        

        .table th,
        .table td {
            vertical-align: middle;
            text-align: center;
            padding: 12px;
        }

        .table th {
            background-color: #2980b9;
            color: white;
            font-weight: bold;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
            padding: 10px 20px;
            border-radius: 6px;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #2980b9;
        }

        .alert-info {
            background-color: #d1ecf1;
            color: #0c5460;
            font-size: 16px;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 30px;
        }

        .btn-secondary {
            background-color: #95a5a6;
            border-color: #95a5a6;
            padding: 12px 20px;
            border-radius: 6px;
            font-size: 16px;
            transition: background-color 0.3s;
            margin-top: 20px;
            display: inline-block;
            width: auto;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-secondary:hover {
            background-color: #7f8c8d;
        }

        .btn-link {
            color: #3498db;
            text-decoration: none;
            font-size: 16px;
            padding: 8px 16px;
            border-radius: 6px;
            display: inline-block;
            margin-top: 10px;
            background-color: #3498db;
            color: white;
            transition: background-color 0.3s;
        }

        .btn-link:hover {
            background-color: #2980b9;
            text-decoration: none;
        } */
    </style>
</head>

<body>
    <div class="container mt-5 w-75 bg-white rounded">
        <h1 style="font-weight: 700;" class=" pt-5"><?= $title; ?></h1>
       
        <!-- Display alert if no schedule is available -->
        <?php if (empty($jadwal)): ?>
            <div class="alert alert-info" role="alert">
                Belum ada jadwal perkuliahan.
            </div>
            <?php else: ?>
                <!-- Table displaying the schedule inside a centered container -->
                <div class="table-container">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Hari</th>
                            <th>Jam</th>
                            <th>Mata Kuliah</th>
                            <th>Ruangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jadwal as $index => $row): ?>
                            <tr>
                                <td><?= $index + 1; ?></td>
                                <td><?= $row['hari']; ?></td>
                                <td><?= $row['jam_mulai']; ?> - <?= $row['jam_selesai']; ?></td>
                                <td><?= $row['nama_mata_kuliah']; ?> (<?= $row['kode_mata_kuliah']; ?>)</td>
                                <td><?= $row['ruangan']; ?></td>
                                <td>
                                    <div class="d-grid gap-2">
                                    <a href="<?= base_url('dosen/nilai/nilai/' . $row['id']) ?>" class="btn btn-primary btn-sm hover">Mahasiswa</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                 <a data-bs-toggle="tooltip" data-bs-placement="top" title="Kembali ke Dashboard" class="btn btn-outline-primary shadow my-3 btn-sm rounded-circle " href="<?= base_url('/dashboard') ?>"><i class="fa-solid fa-arrow-left"></i> </a> 

            </div>
</div>
        <?php endif; ?>
    </div>

    <!-- <script src="<?= base_url('js/bootstrap.bundle.min.js'); ?>"></script> -->
</body>

</html>
