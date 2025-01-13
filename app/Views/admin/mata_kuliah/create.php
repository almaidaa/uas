<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah MK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* General page styling */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #495057;
        }

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

<body>
    <div class="container">
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
                    <?php foreach ($dosen as $d): ?>
                        <option value="<?= $d['user_id']; ?>"><?= $d['nama']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/dashboard" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>

</html>
