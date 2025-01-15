<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah MK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    
    <style>
        /* General page styling */

        .container {
            max-width: 700px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin-top: 50px;
        }

        h1 {
            font-size: 32px;
            font-weight: 700;
            color: #1f2d3d;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 500;
            color: #4a5568;
        }

        .form-control {
            border-radius: 6px;
            border: 1px solid #ddd;
            padding: 12px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: #5cb85c;
            box-shadow: 0 0 0 0.25rem rgba(92, 184, 92, 0.5);
        }

        .btn-primary {
            background-color: #0062cc;
            border-color: #0062cc;
            padding: 12px 24px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #004085;
            border-color: #003366;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            padding: 12px 24px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        .form-group {
            margin-bottom: 20px;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .container {
                padding: 30px;
            }

            h1 {
                font-size: 28px;
                margin-bottom: 15px;
            }

            .btn-primary, .btn-secondary {
                width: 100%;
                margin-top: 15px;
            }
        }
    </style>
</head>

<body class="gradient-custom">
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>
    <div class="container-edit">
        <h1 style="font-family: 'Lobster', cursive; font-weight: 700; color: black; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);">Tambah Mata Kuliah</h1>
        <form action="index/store" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="kode_mk" class="form-label" style="font-weight: bold; color: black;">Kode Mata Kuliah</label>
                <input type="text" name="kode_mk" class="form-control" id="kode_mk" required style="font-weight: bold;" maxlength="5">
            </div>
            <div class="mb-3">
                <label for="nama_mk" class="form-label" style="font-weight: bold; color: black;">Nama Mata Kuliah</label>
                <select name="nama_mk" class="form-control" id="nama_mk" required style="font-weight: bold;">
                    <option value="">Pilih Mata Kuliah</option>
                    <option value="Python">Python</option>
                    <option value="Pemohrograman Web">Pemograman Web</option>
                    <option value="Data Mining">Data Mining</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="sks" class="form-label" style="font-weight: bold; color: black;">SKS</label>
                <select name="sks" class="form-control" id="sks" required style="font-weight: bold;">
                    <option value="">Pilih SKS</option>
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="semester" class="form-label" style="font-weight: bold; color: black;">Semester</label>
                <select name="semester" class="form-control" id="semester" required style="font-weight: bold;">
                    <option value="">Pilih Semester</option>
                    <?php for ($i = 1; $i <= 14; $i++): ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/admin/mata_kuliah/index" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>

</html>

