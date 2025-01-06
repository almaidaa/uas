<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Tambah Dosen</h1>
        <form action="index/store" method="post">
            <?= csrf_field(); ?>
            <div class="mb-3">
                <label for="nip" class="form-label">nip</label>
                <input type="text" class="form-control <?= session('validation.nip') ? 'is-invalid' : '' ?>" id="nip" name="nip" value="<?= old('nip') ?>" required>
                <div class="invalid-feedback">
                    <?= session('validation.nip') ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control <?= session('validation.nama') ? 'is-invalid' : '' ?>" id="nama" name="nama" value="<?= old('nama') ?>" required>
                <div class="invalid-feedback">
                    <?= session('validation.nama') ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="departemen" class="form-label">departemen</label>
                <textarea class="form-control <?= session('validation.departemen') ? 'is-invalid' : '' ?>" id="departemen" name="departemen" required><?= old('departemen') ?></textarea>
                <div class="invalid-feedback">
                    <?= session('validation.departemen') ?>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</body>

</html>