<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Input Nilai</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <h2>Jadwal: <?= $jadwal['mata_kuliah'] ?> (<?= $jadwal['hari'] ?>, <?= $jadwal['jam_mulai'] ?> - <?= $jadwal['jam_selesai'] ?>)</h2>

    <form action="<?= base_url('dosen/nilai/input_nilai/update/') ?>" method="post">
        <?= csrf_field() ?>

        <table class="table">
            <thead>
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

        <button type="submit" class="btn btn-primary">Simpan Nilai</button>
    </form>

</body>

</html>