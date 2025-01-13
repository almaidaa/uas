<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
    <style>
        @media print {
            .noPrint{
                display:none;
            }
            }

    </style>
</head>
<body>
    <h1><?= $title ?></h1>

    <?php if (empty($khs)): ?>
        <p>Tidak ada data KHS yang tersedia.</p>
    <?php else: ?>
        <table border="1" cellpadding="5" cellspacing="0" >
            <thead>
                <tr>
                    <th>No</th>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Nama Dosen</th>
                    <th>Semester</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($khs['khs'] as $index => $item): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $item['nama_mk'] ?></td>
                        <td><?= $item['sks'] ?></td>
                        <td><?= $item['nama'] ?></td>
                        <td><?= $item['semester'] ?></td>
                        <td><?= $item['nilai'] ?: 'Belum Ada' ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
    <button onclick="window.print();" class="noPrint">
Print Me
</button>
<script>
    function printDiv(noPrint) {
     var printContents = document.getElementById('noPrint').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</body>
</html>
