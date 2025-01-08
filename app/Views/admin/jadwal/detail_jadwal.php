<h1>Detail Jadwal</h1>

<h2><?= $jadwal['mata_kuliah'] ?></h2>
<p>Hari: <?= $jadwal['hari'] ?></p>
<p>Waktu: <?= $jadwal['jam_mulai'] ?> - <?= $jadwal['jam_selesai'] ?></p>

<h3>Mahasiswa Terdaftar</h3>
<?php if (!empty($mahasiswa)): ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($mahasiswa as $mhs): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $mhs['nim'] ?></td>
                    <td><?= $mhs['nama'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Belum ada mahasiswa yang terdaftar.</p>
<?php endif; ?>

<h3>Tambah Mahasiswa ke Jadwal</h3>
<form action="<?= base_url('admin/jadwal/detail_jadwal/tambah') ?>" method="post">
    <?= csrf_field() ?>
    <input type="hidden" name="jadwal_id" value="<?= $jadwal['id'] ?>">
    <div class="form-group">
        <label for="mahasiswa_id">Mahasiswa:</label>
        <select name="mahasiswa_id" id="mahasiswa_id" class="form-control">
            <option value="">Pilih Mahasiswa</option>
            <?php foreach ($allMahasiswa as $mhs): ?>
                <option value="<?= $mhs['id'] ?>"><?= $mhs['nim'] ?> - <?= $mhs['nama'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Tambah</button>
</form>