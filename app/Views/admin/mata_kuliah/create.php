<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah MK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Tambah MK</h1>
        <form action="index/store" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="kode_mk" class="form-label">Kode Mata Kuliah</label>
                <input type="text" name="kode_mk" class="form-control" id="kode_mk" required>
            </div>
            <div class="mb-3">
                <label for="nama_mk" class="form-label">Nama Mata Kuliah</label>
                <input type="text" name="nama_mk" class="form-control" id="nama_mk" required>
            </div>
            <div class="mb-3">
                <label for="sks" class="form-label">SKS</label>
                <input type="text" name="sks" class="form-control" id="sks" required>
            </div>
            <div class="mb-3">
                <label for="semester" class="form-label">Semester</label>
                <input type="text" name="semester" class="form-control" id="semester" required>
            </div>
            <div class="form-group">
                <label for="dosen_id">Pilih Dosen</label>
                <select name="dosen_id" id="dosen_id" class="form-control" required>
                    <option value="">-- Pilih Dosen --</option>
                    <?php foreach ($users as $user): ?>
                        <option value="<?= $user['id']; ?>"><?= $user['nama']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</body>

</html>