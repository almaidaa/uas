<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color:155E95;
            font-family: sans-serif;
        }

        .log a:hover{
            color: red;
        }
        .card{
            background-color:rgb(255, 255, 255);
            color: #295F98;
        }
        .card:hover{
           background-color:  #295F98;
            color: white;
        }
        .sidebar {
            width: 250px;
            background-color: #295F98;
            color: white;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            padding: 15px;
            z-index: 1030;
        }
        .sidebar-link {
            text-decoration: none;
            color: white;
            padding: 10px 15px;
            display: block;
            margin-bottom: 10px;
        }
        .sidebar-link:hover {
            background-color:rgb(255, 255, 255);
            color: #295F98 ;
        }
        .content {
            margin-left: 250px; /* Sesuaikan dengan lebar sidebar */
            padding: 20px;
        }
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar d-md-block" id="sidebar">
        <h4 class="mb-4">Menu</h4>
        <a href="/admin/mahasiswa/mahasiswa" class="sidebar-link">Kelola Mahasiswa</a>
        <a href="/admin/dosen/index" class="sidebar-link">Kelola Dosen</a>
        <a href="/admin/mata_kuliah/index" class="sidebar-link">Kelola Mata Kuliah</a>
        <a href="/admin/jadwal/index" class="sidebar-link">Kelola Jadwal</a>
        <h4 class="log"><a href="/logout" class="sidebar-link">Log Out</a></h4>
    </div>

    <!-- Hamburger Button (Mobile Only) -->
    <button class="btn btn-primary d-md-none" id="menuToggle" style="position: fixed; top: 10px; left: 10px; z-index: 1040;">
        ☰ Menu
    </button>

    <!-- Main Content -->
    <div class="content">
        <div class="container-fluid">
            <h1 class="text-center mt-3">Dashboard Admin</h1>
            <div class="row justify-content-center">
                <div class="col-md-3 text-center">
                    <div class="card">
                        <div class="card-body">
                            <h5>Total Mahasiswa</h5>
                            <h3 class=""><?= $total_mahasiswa ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="card">
                        <div class="card-body">
                            <h5>Total Dosen</h5>
                            <h3 class=""><?= $total_dosen ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="card">
                        <div class="card-body">
                            <h5>Total Mata Kuliah</h5>
                            <h3 class=""><?= $total_mata_kuliah ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');

        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('show');
        });
    </script>
</body>
</html>
