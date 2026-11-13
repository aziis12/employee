<?php $halaman = basename($_SERVER['PHP_SELF']); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= teksaman($judul) ?></title>
    <!-- Library CSS: Bootstrap + Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font judul -->
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@600&display=swap" rel="stylesheet">
    <!-- CSS buatan sendiri -->
    <link href="css/style.css?v=<?= filemtime(__DIR__ . '/../css/style.css') ?>" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
<?php if (sudahLogin()): ?>
<nav class="navbar navbar-expand-md navbar-dark py-3 header-utama">
    <div class="container">
        <a class="navbar-brand fs-3 judul-serif" href="dashboard.php">
            <img src="assets/logo/logo.png" alt="Logo" class="logo-brand"> Data Pegawai
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link <?= $halaman == 'dashboard.php' ? 'active' : '' ?>" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= in_array($halaman, ['pegawai.php', 'form_pegawai.php', 'detail_pegawai.php']) ? 'active' : '' ?>" href="pegawai.php">Daftar Pegawai</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="php/logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container pt-4">
    <h1 class="judul-serif judul-halaman mb-0"><?= teksaman($judul) ?></h1>
</div>
<?php endif; ?>
<main class="container py-4 flex-grow-1">
