<?php
require_once 'php/fungsi.php';
wajiblogin();

// Jika ada ?id=... berarti mode EDIT, jika tidak berarti mode TAMBAH
$id = (int) ($_GET['id'] ?? 0);
$p = ['nip' => '', 'nama' => '', 'jenis_kelamin' => '', 'email' => '', 'nohp' => '', 'alamat' => '', 'jabatan' => ''];
if ($id) {
    $p = ambilpegawai($pdo, $id);
    if (!$p) { header('Location: pegawai.php'); exit; }
}

$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);

$judul = $id ? 'Edit Pegawai' : 'Tambah Pegawai';
include 'includes/header.php';
?>
<?php if ($error): ?>
    <div class="alert alert-danger"><?= teksaman($error) ?></div>
<?php endif; ?>

<form method="post" action="php/proses_simpan.php" class="needs-validation animate-fade" novalidate>
    <input type="hidden" name="id" value="<?= $id ?>">
    <div class="row g-3">
        <div class="col-md-6">
            <label class="form-label" for="nip">NIP</label>
            <input type="text" class="form-control" id="nip" name="nip" value="<?= teksaman($p['nip']) ?>" required pattern="[0-9]+">
            <div class="invalid-feedback">NIP wajib diisi dan hanya berupa angka.</div>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= teksaman($p['nama']) ?>" required>
            <div class="invalid-feedback">Nama wajib diisi.</div>
        </div>

        <div class="col-md-6">
            <label class="form-label d-block">Jenis kelamin</label>
            <div class="btn-group w-100 grup-jk" role="group" aria-label="Jenis kelamin">
                <input type="radio" class="btn-check" name="jenis_kelamin" id="jk_l" value="Laki-laki" autocomplete="off" required
                       <?= $p['jenis_kelamin'] == 'Laki-laki' ? 'checked' : '' ?>>
                <label class="btn btn-outline-primary" for="jk_l">Laki-laki</label>

                <input type="radio" class="btn-check" name="jenis_kelamin" id="jk_p" value="Perempuan" autocomplete="off" required
                       <?= $p['jenis_kelamin'] == 'Perempuan' ? 'checked' : '' ?>>
                <label class="btn btn-outline-primary" for="jk_p">Perempuan</label>
            </div>
            <div class="invalid-feedback">Pilih jenis kelamin.</div>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="jabatan">Jabatan</label>
            <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= teksaman($p['jabatan']) ?>" required>
            <div class="invalid-feedback">Jabatan wajib diisi.</div>
        </div>

        <div class="col-md-6">
            <label class="form-label" for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= teksaman($p['email']) ?>" required>
            <div class="invalid-feedback">Masukkan email yang valid.</div>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="nohp">No HP</label>
            <input type="text" class="form-control" id="nohp" name="nohp" value="<?= teksaman($p['nohp']) ?>" required pattern="[0-9]{8,15}">
            <div class="invalid-feedback">No HP wajib diisi (8-15 digit angka).</div>
        </div>

        <div class="col-12">
            <label class="form-label" for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?= teksaman($p['alamat']) ?></textarea>
            <div class="invalid-feedback">Alamat wajib diisi.</div>
        </div>
    </div>
    <div class="mt-4">
        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
        <a href="pegawai.php" class="btn btn-secondary">Batal</a>
    </div>
</form>
<?php include 'includes/footer.php'; ?>