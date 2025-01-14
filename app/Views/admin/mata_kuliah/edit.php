<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* General page styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            color: #333;
        }

        .container {
            max-width: 800px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 40px;
        }

        h1 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 30px;
            color: #4b5c6b;
        }

        .form-label {
            font-weight: 600;
            color: #4b5c6b;
        }

        .form-control {
            border-radius: 4px;
            box-shadow: none;
            border: 1px solid #ddd;
            padding: 12px;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: #5c6bc0;
            box-shadow: 0 0 5px rgba(92, 107, 192, 0.5);
        }

        .btn-primary {
            background-color: #5c6bc0;
            border-color: #5c6bc0;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #475d8b;
            border-color: #475d8b;
        }

        .btn-secondary {
            background-color: #aaa;
            border-color: #aaa;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-secondary:hover {
            background-color: #777;
            border-color: #777;
        }

        .alert {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }

        .alert-danger strong {
            font-weight: bold;
        }

        /* Responsive design for smaller devices */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            h1 {
                font-size: 24px;
                margin-bottom: 20px;
            }

            .btn-primary, .btn-secondary {
                width: 100%;
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Mata Kuliah</h1>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <form action="/admin/mata_kuliah/update/<?= $mata_kuliah['id'] ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="kode_mk" class="form-label">Kode MK</label>
                <input type="text" name="kode_mk" class="form-control" id="kode_mk" value="<?= $mata_kuliah['kode_mk'] ?>" required disabled>
            </div>
            <div class="mb-3">
                <label for="nama_mk" class="form-label">Nama MK</label>
                <input type="text" name="nama_mk" class="form-control" id="nama_mk" value="<?= $mata_kuliah['nama_mk'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="sks" class="form-label">SKS</label>
                <input type="number" name="sks" class="form-control" id="sks" value="<?= $mata_kuliah['sks'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="semester" class="form-label">Semester</label>
                <select name="semester" id="semester" class="form-control" required>
                    <option value="" disabled selected>Pilih Semester</option>
                    <option value="1" <?= $mata_kuliah['semester'] == 1 ? 'selected' : '' ?>>1</option>
                    <option value="2" <?= $mata_kuliah['semester'] == 2 ? 'selected' : '' ?>>2</option>
                    <option value="3" <?= $mata_kuliah['semester'] == 3 ? 'selected' : '' ?>>3</option>
                    <option value="4" <?= $mata_kuliah['semester'] == 4 ? 'selected' : '' ?>>4</option>
                    <option value="5" <?= $mata_kuliah['semester'] == 5 ? 'selected' : '' ?>>5</option>
                    <option value="6" <?= $mata_kuliah['semester'] == 6 ? 'selected' : '' ?>>6</option>
                    <option value="7" <?= $mata_kuliah['semester'] == 7 ? 'selected' : '' ?>>7</option>
                    <option value="8" <?= $mata_kuliah['semester'] == 8 ? 'selected' : '' ?>>8</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="/admin/mata_kuliah/index" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>
