<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color:rgb(80, 137, 213);">
    <div class="container mt-5">
        <h1 style="text-align: center; text-shadow: 2px 2px 5px rgba(0,0,0,0.3);" class="mb-4">Input Nilai</h1>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <h2 style="text-shadow: 2px 2px 5px rgba(0,0,0,0.3);">Jadwal: <?= $jadwal['mata_kuliah'] ?> (<?= $jadwal['hari'] ?>, <?= $jadwal['jam_mulai'] ?> - <?= $jadwal['jam_selesai'] ?>)</h2>

        <form action="<?= base_url('dosen/nilai/input_nilai/update/') ?>" method="post">
            <?= csrf_field() ?>

            <table class="table mt-3">
                <thead class="table-light">
                    <tr>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($krs as $item): ?>
                        <tr>
                            <input type="hidden" name="jadwalId" value="<?= $jadwal['id'] ?>">
                            <input type="hidden" name="userId" value="<?= $item['mahasiswa_id'] ?>">
                            <td><?= $item['nim'] ?></td>
                            <td><?= $item['mahasiswa_nama'] ?></td>
                            <td>
                                <select name="nilai[<?= $item['krs_id'] ?>]" class="form-control" required>
                                    <option value="">-- Pilih Nilai --</option>
                                    <option value="A" <?= $item['nilai'] == 'A' ? 'selected' : '' ?>>A</option>
                                    <option value="B" <?= $item['nilai'] == 'B' ? 'selected' : '' ?>>B</option>
                                    <option value="C" <?= $item['nilai'] == 'C' ? 'selected' : '' ?>>C</option>
                                    <option value="D" <?= $item['nilai'] == 'D' ? 'selected' : '' ?>>D</option>
                                    <option value="E" <?= $item['nilai'] == 'E' ? 'selected' : '' ?>>E</option>
                                </select>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary mt-3">Simpan Nilai</button>
                <a href="<?= base_url('dosen/nilai/nilai/' . $jadwal['id']) ?>" class="btn btn-secondary mt-3">Batal</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

