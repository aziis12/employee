<?php
require_once 'php/fungsi.php';
wajiblogin();

$p = ambilpegawai($pdo, (int) ($_GET['id'] ?? 0));
if (!$p) { header('Location: pegawai.php'); exit; }

$judul = 'Detail Pegawai';
include 'includes/header.php';
?>
<div class="card animate-fade">
    <div class="card-body">
        <table class="table table-borderless mb-0">
            <tr><th style="width:150px">NIP</th><td><?= teksaman($p['nip']) ?></td></tr>
            <tr><th>Nama</th><td><?= teksaman($p['nama']) ?></td></tr>
            <tr><th>Email</th><td><?= teksaman($p['email']) ?></td></tr>
            <tr><th>No HP</th><td><?= teksaman($p['nohp']) ?></td></tr>
            <tr><th>Alamat</th><td><?= teksaman($p['alamat']) ?></td></tr>
            <tr><th>Jabatan</th><td><?= teksaman($p['jabatan']) ?></td></tr>
        </table>
    </div>
</div>
<div class="mt-3">
    <a href="form_pegawai.php?id=<?= (int) $p['id'] ?>" class="btn btn-warning">Edit</a>
    <a href="pegawai.php" class="btn btn-secondary">Kembali</a>
</div>
<?php include 'includes/footer.php'; ?>
