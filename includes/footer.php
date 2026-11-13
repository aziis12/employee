</main>

<!-- Footer -->
<footer class="footer-utama py-3 mt-auto">
    <div class="container text-center">
        &copy; <?= date('Y') ?> Data Pegawai.
    </div>
</footer>

<!-- Library JavaScript: jQuery + Bootstrap -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- JavaScript buatan sendiri -->
<script src="js/app.js?v=<?= filemtime(__DIR__ . '/../js/app.js') ?>"></script>
</body>
</html>
 