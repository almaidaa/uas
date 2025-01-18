
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jadwal Perkuliahan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <h1 style="font-family: 'Roboto', sans-serif; font-size: 36px; font-weight: 700; color: #34495e;">Edit Jadwal Perkuliahan</h1>
        <form action="/admin/jadwal/update" method="post">
            <?= csrf_field() ?>
            <input type="text" name="idnya" value="<?= esc($jadwal['id']) ?>" hidden>
            <div class="mb-3">
                <label for="mata_kuliah_id" class="form-label">Mata Kuliah</label>
                <select name="mata_kuliah_id" class="form-control" required disabled>
                    <option value="">Pilih Mata Kuliah</option>
                    <?php foreach ($mata_kuliah as $mk): ?>
                        <option value="<?= $mk['id'] ?>" <?= isset($jadwal['id']) && $jadwal['mata_kuliah_id'] == $mk['id'] ? 'selected' : '' ?>><?= esc($mk['nama_mk']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="dosen_id" class="form-label">Dosen</label>
                <select name="dosen_id" class="form-control" required>
                    <option value="">Pilih Dosen</option>
                    <?php foreach ($dosen as $d): ?>
                        <option value="<?= $d['id'] ?>" <?= isset($jadwal['id']) && $jadwal['dosen_id'] == $d['id'] ? 'selected' : '' ?>><?= esc($d['nama']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="hari" class="form-label">Hari</label>
                <select name="hari" class="form-control" required>
                    <option value="">Pilih Hari</option>
                    <?php 
                    $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                    foreach ($days as $day): 
                    ?>
                        <option value="<?= $day ?>" <?= isset($jadwal['hari']) && $jadwal['hari'] == $day ? 'selected' : '' ?>><?= $day ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- <div class="mb-3">
                <label for="hari" class="form-label">Hari</label>
                <select name="hari" class="form-control" required>
                    <option value="">Pilih Hari</option>
                    <option value="Monday">Senin</option>
                    <option value="Tuesday">Selasa</option>
                    <option value="Wednesday">Rabu</option>
                    <option value="Thursday">Kamis</option>
                    <option value="Friday">Jumat</option>
                    <option value="Saturday">Sabtu</option>
                </select>
            </div> -->

            <div class="mb-3">
                <label for="jam_mulai" class="form-label">Jam Mulai</label>
                <input type="time" name="jam_mulai" class="form-control" value="<?= $jadwal['jam_mulai'] ?? '' ?>" required>
            </div>

            <div class="mb-3">
                <label for="jam_selesai" class="form-label">Jam Selesai</label>
                <input type="time" name="jam_selesai" class="form-control" value="<?= $jadwal['jam_selesai'] ?? '' ?>" required>
            </div>

            <!-- <div class="mb-3">
                <label for="ruangan" class="form-label">Ruangan</label>
                <input type="text" name="ruangan" class="form-control" value="<?= $jadwal['ruangan'] ?? '' ?>" required>
            </div> -->

            <div class="mb-3">
                <label for="ruangan" class="form-label">Ruangan</label>
                <select name="ruangan" class="form-control" required>
                    <option value="">Pilih Ruangan</option>
                    <option value="A1" <?= isset($jadwal['ruangan']) && $jadwal['ruangan'] == 'A1' ? 'selected' : '' ?>>A1</option>
                    <option value="A2" <?= isset($jadwal['ruangan']) && $jadwal['ruangan'] == 'A2' ? 'selected' : '' ?>>A2</option>
                    <option value="A3" <?= isset($jadwal['ruangan']) && $jadwal['ruangan'] == 'A3' ? 'selected' : '' ?>>A3</option>
                    <option value="A4" <?= isset($jadwal['ruangan']) && $jadwal['ruangan'] == 'A4' ? 'selected' : '' ?>>A4</option>
                    <option value="A5" <?= isset($jadwal['ruangan']) && $jadwal['ruangan'] == 'A5' ? 'selected' : '' ?>>A5</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="semester" class="form-label">Semester</label>
                <select name="semester" class="form-control" required disabled>
                    <?php for ($i = 1; $i <= 8; $i++): ?>
                        <option value="<?= $i ?>" 
                        <?= isset($jadwal['semester']) && $jadwal['semester'] == $i ? 'selected' : '' ?>>
                        <?= $i ?>
                    </option>
                    <?php endfor; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="<?= base_url('/admin/jadwal/index') ?>" class="btn btn-secondary">Kembali</>
        </form>
    </div>
</body>

</html>
