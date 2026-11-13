<?php

session_start();
require_once __DIR__ . '/koneksi.php';

//sesilogin
function sudahlogin() {
    return isset($_SESSION['user']);
}

function wajiblogin() {
    if (!sudahlogin()) {
        header('Location: login.php');
        exit;
    }
}
function ceklogin($pdo, $username, $password) {
    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    return $user && password_verify($password, $user['password']);
}

//ini buat agar html aman ditampilin
function teksaman($teks) {
    return htmlspecialchars($teks, ENT_QUOTES, 'UTF-8');
}

//CRUD PEGAWAI
//read semua
function ambilsemuapegawai($pdo) {
    return $pdo->query('SELECT * FROM pegawai ORDER BY id DESC')->fetchAll();
}

//read satu
function ambilpegawai($pdo, $id) {
    $stmt = $pdo->prepare ('SELECT * FROM pegawai WHERE id= ?');
    $stmt->execute([$id]);
    return $stmt->fetch();
}
function hitungpegawai($pdo) {
    return (int) $pdo->query('SELECT COUNT(*) FROM pegawai')->fetchColumn();
}

//create
function tambahpegawai($pdo, $d) {
    $stmt = $pdo->prepare('INSERT INTO pegawai (nip, nama, jenis_kelamin, nohp, email, alamat, jabatan) VALUES (?, ?, ?, ?, ?, ?, ?)');
    return $stmt->execute([$d['nip'], $d['nama'], $d['jenis_kelamin'], $d['nohp'], $d['email'], $d['alamat'], $d['jabatan']]);
}
//update
function ubahpegawai($pdo, $id, $d) {
    $stmt = $pdo->prepare('UPDATE pegawai SET nip = ?, nama = ?, jenis_kelamin = ?, nohp = ?, email = ?, alamat = ?, jabatan = ? WHERE id = ?');
    return $stmt->execute([$d['nip'], $d['nama'], $d['jenis_kelamin'], $d['nohp'], $d['email'], $d['alamat'], $d['jabatan'], $id]);
}

//DEL
function hapuspegawai($pdo, $id) {
    $stmt = $pdo->prepare('DELETE FROM pegawai WHERE id = ?');
    return $stmt->execute([$id]);
}

//paginasi
function ambilPegawaiHalaman($pdo, $limit, $offset) {
    $stmt = $pdo->prepare('SELECT * FROM pegawai ORDER BY id DESC LIMIT :limit OFFSET :offset');
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
}