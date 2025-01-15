<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <style>

        h1 {
            font-size: 36px;
            color: #34495e;
            font-weight: 600;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: 600;
            color: #34495e;
        }

        .form-control {
            border-radius: 10px;
            padding: 14px;
            font-size: 16px;
            border: 1px solid #dfe4ea;
            background-color: #f1f4f8;
            margin-bottom: 20px;
        }

        .form-control:focus {
            border-color: #2ecc71;
            box-shadow: 0 0 8px rgba(46, 204, 113, 0.5);
        }

        .btn-success {
            background-color: #2ecc71;
            border-color: #2ecc71;
            padding: 14px 25px;
            font-size: 18px;
            font-weight: 500;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            background-color: #27ae60;
            border-color: #27ae60;
            cursor: pointer;
        }

        .btn-secondary {
            background-color: #95a5a6;
            border-color: #95a5a6;
            padding: 14px 25px;
            font-size: 18px;
            font-weight: 500;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #7f8c8d;
            border-color: #7f8c8d;
            cursor: pointer;
        }

        .invalid-feedback {
            font-size: 14px;
            color: #dc3545;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 30px;
            }

            h1 {
                font-size: 32px;
            }

            .btn-success, .btn-secondary {
                width: 100%;
                padding: 12px;
                font-size: 16px;
            }
        }
    </style>
</head>

<body class="gradient-custom">
    
    <!-- Display success message if available -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <!-- Display error message if available -->
    <?php if (session()->getFlashdata('failed')): ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('failed') ?>
        </div>
    <?php endif; ?>

    
    <div class="container-edit">
        <!-- Display error messages if available -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        
        <!-- Title -->
        <h1 style="font-weight: bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">Tambah Dosen</h1>
        
        <!-- Dosen Form -->
        <form action="index/store" method="post">
            <?= csrf_field(); ?>
            
            <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" class="form-control <?= session('validation.nip') ? 'is-invalid' : '' ?>" id="nip" name="nip" value="<?= old('nip') ?>" required minlength="12" maxlength="12">
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
                <label for="departemen" class="form-label">Departemen</label>
                <select class="form-control <?= session('validation.departemen') ? 'is-invalid' : '' ?>" id="departemen" name="departemen" required>
                    <option value="" disabled selected>Pilih Departemen</option>
                    <option value="Informatika" <?= old('departemen') == 'Informatika' ? 'selected' : '' ?>>Informatika</option>
                    <option value="Elektro" <?= old('departemen') == 'Elektro' ? 'selected' : '' ?>>Elektro</option>
                    <option value="Sipil" <?= old('departemen') == 'Sipil' ? 'selected' : '' ?>>Sipil</option>
                </select>
                <div class="invalid-feedback">
                    <?= session('validation.departemen') ?>
                </div>
            </div>

            
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="<?= base_url('/admin/dosen/index') ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>

</html>
