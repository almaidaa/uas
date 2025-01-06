<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Selamat Datang, <?= esc($username) ?>!</h1>
        <p>Peran Anda: <?= esc($role) ?></p>
        <a href="/logout" class="btn btn-danger">Logout</a>
    </div>
</body>
</html>
