<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <style>


    </style>
</head>
<body class="gradient-custom" >
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgba(0, 0, 0, 0.7); backdrop-filter: blur(10px);">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      data-mdb-collapse-init
      class="navbar-toggler"
      type="button"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="#">
        <img
          src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp"
          height="15"
          alt="MDB Logo"
          loading="lazy"
        />
      </a>
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="/admin/mahasiswa/mahasiswa">Kelola Mahasiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/admin/dosen/index">Kelola Dosen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/admin/mata_kuliah/index">Kelola Mata Kuliah</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/admin/jadwal/index">Kelola Jadwal</a>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">
      <!-- Icon -->
      <a class="text-reset me-3" href="#">
        <i class="fas fa-shopping-cart"></i>
      </a>

      <!-- Dropdown -->
      <div class="dropdown">
        <button
          class="btn btn-danger dropdown-toggle"
          type="button"
          id="dropdownMenuButton1"
          data-bs-toggle="dropdown"
          aria-expanded="false"
        >
          <?= esc(session()->get('username')) ?>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="/admin/profile">Profil</a></li>
          <li><a class="dropdown-item" href="/admin/settings">Pengaturan</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="/logout">Keluar</a></li>
        </ul>
      </div>
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
    <!-- Main Content -->
    <div class="content">
        <div class="container-fluid">
            <h1 class="text-center mt-3" style="font-weight: bold; text-shadow: 2px 2px 5px rgba(0,0,0,0.3);">Selamat Datang, <?= esc(session()->get('username')) ?>!</h1>
            <div class="row justify-content-center">
                <div class="col-md-3 text-center">
                    <div class="card">
                        <div class="card-custom">
                            <h5>Total Mahasiswa</h5>
                            <h3 class=""><?= $total_mahasiswa ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="card">
                        <div class="card-custom">
                            <h5>Total Dosen</h5>
                            <h3 class=""><?= $total_dosen ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="card">
                        <div class="card-custom">
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
