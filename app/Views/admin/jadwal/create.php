<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadwal Perkuliahan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">

    <style>

        /* Container with a fresh layout */
        .container {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 50px;
            margin-top: 50px;
            max-width: 900px;
            text-align: center;
        }

        /* Main title styling */
        h1 {
            font-size: 36px;
            color: #34495e;
            font-weight: 600;
            margin-bottom: 30px;
        }

        /* Form labels */
        .form-label {
            font-weight: 600;
            color: #34495e;
        }

        /* Form input fields */
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

        /* Submit button */
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

        /* Secondary (Back) button styling */
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

        /* Responsive design adjustments */
        @media (max-width: 768px) {
            .container {
                padding: 30px;
            }

            h1 {
                font-size: 32px;
            }

            .btn-success {
                width: 100%;
                padding: 12px;
                font-size: 16px;
            }

            .btn-secondary {
                width: 100%;
                padding: 12px;
                font-size: 16px;
            }
        }
    </style>
</head>

<body class="gradient-custom">
    <div class="container">
        <h1>Tambah Jadwal Perkuliahan</h1>
        <form action="index/store" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="mata_kuliah_id" class="form-label">Mata Kuliah</label>
                <select name="mata_kuliah_id" class="form-control" required id="mata_kuliah_id">
                    <option value="">Pilih Mata Kuliah</option>
                    <?php foreach ($mata_kuliah as $mk): ?>
                        <option value="<?= $mk['id'] ?>" data-semester="<?= $mk['semester'] ?>"><?= esc($mk['nama_mk']) ?></option>
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
                <select name="hari" class="form-control" required>
                    <option value="">Pilih Hari</option>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                </select>
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
                <select name="ruangan" class="form-control" required>
                    <option value="">Pilih Ruangan</option>
                    <option value="A1">A1</option>
                    <option value="A2">A2</option>
                    <option value="A3">A3</option>
                    <option value="A4">A4</option>
                    <option value="A5">A5</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="semester" class="form-label">Semester</label>
                <select name="semester" class="form-control" required disabled id="semester">
                    <option value="">Semester</option>
                </select>
            </div>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const selectMataKuliah = document.getElementById('mata_kuliah_id');
                    const selectSemester = document.getElementById('semester');

                    selectMataKuliah.addEventListener('change', function() {
                        const semester = this.options[this.selectedIndex].getAttribute('data-semester');
                        selectSemester.innerHTML = `<option value="${semester}">${semester}</option>`;
                    });
                });
            </script>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="<?= base_url('/dashboard') ?>" class="btn btn-secondary">Kembali</>
        </form>
    </div>
</body>

</html>
