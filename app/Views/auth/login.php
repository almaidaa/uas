<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Web Kampus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom right, #4a69bd, #6a89cc);
            color: #fff;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            padding: 30px;
            color: #333;
        }

        .login-container h3 {
            margin-bottom: 20px;
        }

        .campus-logo {
            display: block;
            margin: 0 auto 20px auto;
            width: 100px;
        }

        .btn-primary {
            background-color: #4a69bd;
            border: none;
        }

        .btn-primary:hover {
            background-color: #3b5998;
        }

        .form-control:focus {
            border-color: #4a69bd;
            box-shadow: 0 0 5px rgba(74, 105, 189, 0.5);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="login-container">
                    <img src="/img/unsera.png" alt="Logo Kampus" class="campus-logo">
                    <h3 class="text-center">Universitas Kelompok 2 <br></h3>
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>
                    <form action="/login/process" method="post" autocomplete="on">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                    <!-- <div class="text-center mt-3">
                        <small>Belum punya akun? <a href="/register" class="text-primary">Daftar di sini</a></small>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>
