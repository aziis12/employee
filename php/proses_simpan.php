<?php
// Menyimpan data dari form: tambah (id kosong) atau ubah (ada id)
require_once __DIR__ . '/fungsi.php';
wajiblogin();

$id = (int) ($_POST['id'] ?? 0);
$data = [
    'nip'     => trim($_POST['nip'] ?? ''),
    'nama'    => trim($_POST['nama'] ?? ''),
    'jenis_kelamin' => trim($_POST['jenis_kelamin'] ?? ''),
    'email'   => trim($_POST['email'] ?? ''),
    'nohp' => trim($_POST['nohp'] ?? ''),
    'alamat' => trim($_POST['alamat'] ?? ''),
    'jabatan' => trim($_POST['jabatan'] ?? ''),
];

// Validasi di sisi server
if (in_array('', $data, true) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = 'Semua kolom wajib diisi dengan benar.';
    header('Location: ../form_pegawai.php' . ($id ? '?id=' . $id : ''));
    exit;
}

try {
    if ($id) {
        ubahpegawai($pdo, $id, $data);
    } else {
        tambahpegawai($pdo, $data);
    }
    header('Location: ../pegawai.php');
} catch (PDOException $ex) {
    $_SESSION['error'] = 'Gagal menyimpan data (NIP mungkin sudah dipakai).';
    header('Location: ../form_pegawai.php' . ($id ? '?id=' . $id : ''));
}
exit;
