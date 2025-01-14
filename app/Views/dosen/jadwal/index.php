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
        .shadow-custom{
            border-radius: 50px;
background: #242a7f;
box-shadow:  23px 23px 46px #1f246c,
             -23px -23px 46px #293092;
        }
        h1 {
            font-weight: bolder;
            text-shadow: 4px 4px 8px rgba(232, 232, 232, 0.5);
        }


    </style>
</head>

<body style="background-color: #242a7f;">
    <div class="container mt-5 w-75 bg rounded shadow-custom-text">
        <h1 style="font-weight: 700;" class=" pt-5 text-light text-center shadow-lg"><?= $title; ?></h1>
       
        <!-- Display alert if no schedule is available -->
        <?php if (empty($jadwal)): ?>
            <div class="alert alert-info" role="alert">
                Belum ada jadwal perkuliahan.
            </div>
            <div class="text-center">
            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Kembali ke Dashboard" class="btn btn-outline-primary shadow my-3 btn-sm rounded-circle " href="<?= base_url('/dashboard') ?>"><i class="fa-solid fa-arrow-left"></i> </a> 
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
