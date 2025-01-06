<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KHS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Kartu Hasil Studi</h1>
        <form method="get" action="/khs" class="mb-3">
            <div class="row">
                <div class="col-md-4">
                    <select name="semester" class="form-control">
                        <option value="">Pilih Semester</option>
                        <?php for ($i = 1; $i <= 8; $i++): ?>
                            <option value="<?= $i ?>" <?= ($semester == $i) ? 'selected' : '' ?>>Semester <?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Mata Kuliah</th>
                    <th>Semester</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($khs) > 0): ?>
                    <?php foreach ($khs as $key => $row): ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= esc($row['nama_mk']) ?></td>
                            <td><?= esc($row['semester']) ?></td>
                            <td><?= esc($row['nilai']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Data tidak ditemukan</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>