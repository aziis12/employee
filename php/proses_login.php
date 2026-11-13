<?php
require_once __DIR__ . '/fungsi.php';

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

if (ceklogin($pdo, $username, $password)) {
    $_SESSION['user'] = $username;
    header('Location: ../dashboard.php');
} else {
    $_SESSION['error'] = 'Username atau password salah.';
    header('Location: ../login.php');
}
exit;
