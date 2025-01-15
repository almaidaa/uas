<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: url("/img/bg-univ.jpg") no-repeat center center fixed;
           background-size: cover;
           position: relative;
            color: #333;
        }

        .container {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin-top: 50px;
            max-width: 600px;
            text-align: center;
        }

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

        .alert {
            margin-top: 20px;
            border-radius: 10px;
            padding: 14px;
            font-size: 16px;
            border: 1px solid #dfe4ea;
            background-color: #f1f4f8;
            color: #e74c3c;
        }
    </style>
</head>

<body>
    <div class="container" style="background: rgba(255, 255, 255, 0.5); backdrop-filter: blur(20px); box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);">
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        
        <!-- Title -->
        <h1 style="text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.3); font-weight: bold;">Tambah Mahasiswa</h1>
        
        <!-- Form to add a new student -->
        <form action="mahasiswa/store" method="post">
            <?= csrf_field() ?>
            
            <div class="mb-3">
                <label for="nim" class="form-label" style="font-weight: bold; text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.3);">NIM</label>
                <input type="text" name="nim" class="form-control" id="nim" required style="font-weight: bold;">
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label" style="font-weight: bold; text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.3);">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" required style="font-weight: bold;">
            </div>

            <div class="mb-3">
                <label for="jurusan" class="form-label" style="font-weight: bold; text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.3);">Jurusan</label>
                <select name="jurusan" class="form-control" id="jurusan" required style="font-weight: bold;">
                    <option value="" disabled selected>Pilih Jurusan</option>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                    <option value="Teknik Elektro">Teknik Elektro</option>
                    <option value="Manajemen">Manajemen</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="angkatan" class="form-label" style="font-weight: bold; text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.3);">Angkatan</label>
                <?php $years = range(date('Y'), date('Y') + 10); ?>
                <select name="angkatan" class="form-control" id="angkatan" required style="font-weight: bold;">
                    <?php foreach ($years as $year): ?>
                        <option value="<?= $year ?>" <?= old('angkatan') == $year ? 'selected' : '' ?>><?= $year ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="<?= base_url('/dashboard') ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>

</html>
