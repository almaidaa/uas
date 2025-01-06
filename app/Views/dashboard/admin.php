<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Dashboard Admin</h1>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5>Total Mahasiswa</h5>
                        <h2><?= $total_mahasiswa ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5>Total Dosen</h5>
                        <h2><?= $total_dosen ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5>Total Mata Kuliah</h5>
                        <h2><?= $total_mata_kuliah ?></h2>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5>Total Nilai</h5>
                        <h2><?= $total_nilai ?></h2>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</body>

</html>