<?php
require_once 'php/fungsi.php';
wajiblogin();

$total  = hitungpegawai($pdo);
$terbaru = array_slice(ambilsemuapegawai($pdo), 0, 5);   // 5 pegawai terbaru
$judul = 'Dashboard';
include 'includes/header.php';
?>
<p class="text-secondary mb-4 animate-fade">Selamat datang, <strong><?= teksaman($_SESSION['user']) ?></strong>.</p>

<div class="row g-4 mb-4">
    <div class="col-md-6">
        <div class="card kartu-info animate-fade h-100">
            <div class="card-body p-4 d-flex align-items-center">
                
                <i class="bi bi-people ikon me-3"></i>
                <div>
                    <div class="text-secondary">Total Pegawai</div>
                    <div class="judul-serif fs-1 counter" data-target="<?= $total ?>">0</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <a href="pegawai.php" class="card kartu-aksen text-decoration-none animate-fade h-100">
            <div class="card-body p-4 d-flex align-items-center">
                <i class="bi bi-table ikon me-3"></i>
                <div class="judul-serif fs-3">Lihat Daftar Pegawai</div>
            </div>
        </a>
    </div>
</div>

<h2 class="judul-serif fs-4 mb-3">Pegawai terbaru</h2>
<div class="table-responsive animate-fade">
    <table class="table table-bordered bg-white align-middle">
        <thead>
            <tr><th>NIP</th><th>Nama</th><th>Jabatan</th></tr>
        </thead>
        <tbody>
        <?php foreach ($terbaru as $p): ?>
            <tr>
                <td><?= teksaman($p['nip']) ?></td>
                <td><?= teksaman($p['nama']) ?></td>
                <td><?= teksaman($p['jabatan']) ?></td>
            </tr>
        <?php endforeach; ?>
        <?php if (!$terbaru): ?>
            <tr><td colspan="3" class="text-center">Belum ada data pegawai.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
<?php include 'includes/footer.php'; ?>
