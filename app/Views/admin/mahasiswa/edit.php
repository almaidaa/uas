<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Mahasiswa</h1>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <form action="<?= base_url('/admin/mahasiswa/mahasiswa/update/' . $mahasiswa['id']) ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" name="nim" id="nim" value="<?= esc($mahasiswa['nim']) ?>" required disabled>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Mahasiswa</label>
                <input type="text"class="form-control" id="nama" name="nama" value="<?= $mahasiswa['nama'] ?>"  required>
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= $mahasiswa['jurusan'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="angkatan" class="form-label">Angkatan</label>
                <input type="number" class="form-control" id="angkatan" name="angkatan" value="<?= $mahasiswa['angkatan'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="/admin/mahasiswa/mahasiswa" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>
