<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Web Kampus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
       .gradient-custom {
           /* fallback for old browsers */
           background-image: url("/img/bg-univ.jpg");
           background-size: cover;
           background-position: center;
           position: relative;
       }

       .gradient-custom::before {
           content: "";
           position: absolute;
           top: 0;
           left: 0;
           right: 0;
           bottom: 0;
           background-image: linear-gradient(to right, rgba(106, 17, 203, 0.5), rgba(106, 17, 203, 0.5));
           backdrop-filter: blur(50px);
           z-index: 1;
       }

       .gradient-custom > * {
           position: relative;
           z-index: 2;
       }

       .shadow-custom {
        -webkit-box-shadow: -4px 1px 19px 7px rgba(143,39,143,1);
-moz-box-shadow: -4px 1px 19px 7px rgba(143,39,143,1);
box-shadow: -4px 1px 19px 7px rgba(143,39,143,1);
       }
    </style>
</head>

<body>
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white shadow-custom " style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
                <div class="mb-md-5 mt-md-4 pb-5">
                    <!-- <img src="/img/unsera.png" alt="Logo Kampus" class="campus-logo"> -->
                    <h3 class="fw-bold mb-2 text-uppercase">Universitas Kelompok 2 <br></h3>
                    <p class="text-white-50 mb-5">Please enter your login and password!</p>
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>
                    <form action="/login/process" method="post" autocomplete="on">
                        <?= csrf_field() ?>
                        <div data-mdb-input-init class="form-outline form-white mb-4">
                            <input type="text" name="username" class="form-control" id="username" required>
                            <label class="form-label" for="username">Username</label>
                        </div>
                        <div data-mdb-input-init class="form-outline form-white mb-4">
                            <input type="password" name="password" class="form-control" id="password" required>
                            <label class="form-label" for="password">Password</label>
                        </div>
                        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5">Login</button>
                    </form>
                    <!-- <div class="text-center mt-3">
                        <small>Belum punya akun? <a href="/register" class="text-primary">Daftar di sini</a></small>
                    </div> -->
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>

</html>
