<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Tambah Nilai</h1>
        <form action="/nilai/store" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="mahasiswa_id" class="form-label">Mahasiswa</label>
                <select name="mahasiswa_id" class="form-select" id="mahasiswa_id" required>
                    <?php foreach ($mahasiswa as $row): ?>
                        <option value="<?= esc($row['id']) ?>"><?= esc($row['nama']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="mata_kuliah_id" class="form-label">Mata Kuliah</label>
                <select name="mata_kuliah_id" class="form-select" id="mata_kuliah_id" required>
                    <?php foreach ($mata_kuliah as $row): ?>
                        <option value="<?= esc($row['id']) ?>"><?= esc($row['nama_mk']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="dosen_id" class="form-label">Dosen</label>
                <select name="dosen_id" class="form-select" id="dosen_id" required>
                    <?php foreach ($dosen as $row): ?>
                        <option value="<?= esc($row['id']) ?>"><?= esc($row['nama']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="nilai" class="form-label">Nilai</label>
                <input type="number" step="0.01" name="nilai" class="form-control" id="nilai" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</body>
</html>
