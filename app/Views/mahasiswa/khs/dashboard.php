<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {
            .noPrint {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center"><?= $title ?></h1>

        <?php if (empty($khs)): ?>
            <p class="text-center text-muted">Tidak ada data KHS yang tersedia.</p>
        <?php else: ?>
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Nama Dosen</th>
                        <th>Semester</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($khs['khs'] as $index => $item): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= $item['nama_mk'] ?></td>
                            <td><?= $item['sks'] ?></td>
                            <td><?= $item['nama'] ?></td>
                            <td><?= $item['semester'] ?></td>
                            <td><?= $item['nilai'] ?: 'Belum Ada' ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        <a href="/dashboard" class="btn btn-secondary noPrint mt-3">
            Kembali
        </a>
        
        <button onclick="window.print();" class="btn btn-primary noPrint mt-3">
            Print Me
        </button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

