<?php
require_once 'php/fungsi.php';
wajiblogin();

//ini buat paginasi
$perHalaman   = 5;
$halaman      = max(1, (int) ($_GET['halaman'] ?? 1));
$totalData    = hitungPegawai($pdo);
$totalHalaman = max(1, (int) ceil($totalData / $perHalaman));
$halaman      = min($halaman, $totalHalaman);
$offset       = ($halaman - 1) * $perHalaman;
$daftar       = ambilPegawaiHalaman($pdo, $perHalaman, $offset);
$judul = 'Daftar Pegawai';
include 'includes/header.php';
?>
<div class="d-flex justify-content-end mb-3">
    <a href="form_pegawai.php" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Pegawai</a>
</div>

<div class="table-responsive animate-fade">
    <table class="table table-striped table-bordered align-middle">
        <thead class="table-dark">
            <tr><th>No</th><th>NIP</th><th>Nama</th><th>Jabatan</th><th class="text-center">Aksi</th></tr>
        </thead>
        <tbody>
        <?php foreach ($daftar as $i => $p): ?>
            <tr id="baris-<?= (int) $p['id'] ?>">
                <td><?= $offset + $i + 1 ?></td>
                <td><?= teksaman($p['nip']) ?></td>
                <td><?= teksaman($p['nama']) ?></td>
                <td><?= teksaman($p['jabatan']) ?></td>
                <td class="text-center">
                    <a href="detail_pegawai.php?id=<?= (int) $p['id'] ?>" class="btn btn-sm btn-info"><i class="bi bi-eye"></i> Detail</a>
                    <a href="form_pegawai.php?id=<?= (int) $p['id'] ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i> Edit</a>
                    <button class="btn btn-sm btn-danger btn-hapus" data-id="<?= (int) $p['id'] ?>"><i class="bi bi-trash"></i> Hapus</button>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php if (!$daftar): ?>
            <tr><td colspan="5" class="text-center">Belum ada data pegawai.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>


<nav>
    <ul class="pagination justify-content-center">
        <li class="page-item <?= $halaman <= 1 ? 'disabled' : '' ?>">
            <a class="page-link" href="?halaman=<?= $halaman - 1 ?>">Sebelumnya</a>
        </li>
        <?php for ($n = 1; $n <= $totalHalaman; $n++): ?>
            <li class="page-item <?= $n == $halaman ? 'active' : '' ?>">
                <a class="page-link" href="?halaman=<?= $n ?>"><?= $n ?></a>
            </li>
        <?php endfor; ?>
        <li class="page-item <?= $halaman >= $totalHalaman ? 'disabled' : '' ?>">
            <a class="page-link" href="?halaman=<?= $halaman + 1 ?>">Berikutnya</a>
        </li>
    </ul>
</nav>

<?php include 'includes/footer.php'; ?>