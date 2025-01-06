<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadwal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Tambah Jadwal Perkuliahan</h1>
        <form action="index/store" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="mata_kuliah_id" class="form-label">Mata Kuliah</label>
                <select name="mata_kuliah_id" class="form-control" required>
                    <option value="">Pilih Mata Kuliah</option>
                    <?php foreach ($mata_kuliah as $mk): ?>
                        <option value="<?= $mk['id'] ?>"><?= esc($mk['nama_mk']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="dosen_id" class="form-label">Dosen</label>
                <select name="dosen_id" class="form-control" required>
                    <option value="">Pilih Dosen</option>
                    <?php foreach ($dosen as $d): ?>
                        <option value="<?= $d['id'] ?>"><?= esc($d['nama']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="hari" class="form-label">Hari</label>
                <input type="text" name="hari" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="jam_mulai" class="form-label">Jam Mulai</label>
                <input type="time" name="jam_mulai" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="jam_selesai" class="form-label">Jam Selesai</label>
                <input type="time" name="jam_selesai" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="ruangan" class="form-label">Ruangan</label>
                <input type="text" name="ruangan" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</body>

</html>