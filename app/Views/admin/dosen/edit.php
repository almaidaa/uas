<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<div class="container mt-5">
        <h1>Edit Dosen</h1>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <form action="<?= base_url('/admin/dosen/index/update/' . $dosen['id']) ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="nip" class="form-label">NIDN:</label>
                <input type="text" class="form-control" name="nip" id="nip" value="<?= old('nip', $dosen['nip']) ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Dosen</label>
                <input type="text"class="form-control" id="nama" name="nama" value="<?= old('nama', $dosen['nama']) ?>">
            </div>
            <div class="mb-3">
                <label for="departemen" class="form-label">Departemen:</label>
                <input type="text" class="form-control" id="departemen" name="departemen" value="<?= old('departemen', $dosen['departemen']) ?>">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="/dashboard" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</html>

