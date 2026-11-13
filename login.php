<?php
require_once 'php/fungsi.php';
if (sudahlogin()) { header('Location: dashboard.php'); exit; }

$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);

$judul = 'Login';
include 'includes/header.php';
?>
<div class="row justify-content-center">
    <div class="col-md-5 col-lg-4">
        <div class="card shadow animate-fade">
            <div class="card-body p-4">
                <div class="card-body p-4">

    <div class="login-header">
        <img src="assets/logo/logo.png" alt="Logo" class="logo-brand">
        <h4>Login</h4>
    </div>

    <?php if ($error): ?>
        <div class="alert alert-danger">
            <?= teksaman($error) ?>
        </div>
    <?php endif; ?>

    <!-- Form login tetap seperti sebelumnya -->
                <form method="post" action="php/proses_login.php" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label class="form-label" for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                        <div class="invalid-feedback">Username wajib diisi.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <div class="invalid-feedback">Password wajib diisi.</div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Masuk</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>
