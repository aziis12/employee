<?php
// Dipanggil lewat AJAX (jQuery) dari js/app.js
require_once __DIR__ . '/fungsi.php';
header('Content-Type: application/json');

if (!sudahlogin() || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false]);
    exit;
}

$ok = hapuspegawai($pdo, (int) ($_POST['id'] ?? 0));
echo json_encode(['success' => $ok]);
