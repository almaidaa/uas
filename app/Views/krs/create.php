<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Tambah KRS</h1>
        <form action="/krs/store" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="jadwal_id" class="form-label">Pilih Jadwal Mata Kuliah</label>
                <select name="jadwal_id" class="form-control" required>
                    <option value="">Pilih Jadwal</option>
                    <?php foreach ($jadwal as $row): ?>
                        <option value="<?= $row['id'] ?>">
                            <?= esc($row['nama_mk']) ?> - <?= esc($row['dosen']) ?>
                            (<?= esc($row['hari']) ?>, <?= esc($row['jam_mulai']) ?> - <?= esc($row['jam_selesai']) ?>, <?= esc($row['ruangan']) ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="semester" class="form-label">Semester</label>
                <input type="number" name="semester" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</body>

</html>