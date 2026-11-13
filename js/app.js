$(function () {
  // VALIDASI FORM (JavaScript)
  // Form yang punya class "needs-validation" dicek sebelum dikirim
  $("form.needs-validation").on("submit", function (event) {
    if (!this.checkValidity()) {
      event.preventDefault(); // batalkan pengiriman jika ada yang salah
      event.stopPropagation();
    }
    $(this).addClass("was-validated"); // tampilkan pesan error Bootstrap
  });

  // ANIMASI (JavaScript): angka total pegawai menghitung naik dari 0
  $(".counter").each(function () {
    var $el = $(this);
    var target = parseInt($el.data("target"), 10) || 0;
    $({ n: 0 }).animate(
      { n: target },
      {
        duration: 1000,
        step: function () {
          $el.text(Math.floor(this.n));
        },
        complete: function () {
          $el.text(target);
        },
      },
    );
  });

  // AJAX (jQuery): hapus pegawai tanpa reload halaman
  $(".btn-hapus").on("click", function () {
    var id = $(this).data("id");
    if (!confirm("Yakin ingin menghapus pegawai ini?")) {
      return;
    }

    $.ajax({
      url: "php/proses_hapus.php",
      method: "POST",
      data: { id: id },
      dataType: "json",
    })
      .done(function (res) {
        if (res.success) {
          $("#baris-" + id).fadeOut(400, function () {
            $(this).remove();
          });
        } else {
          alert("Gagal menghapus data.");
        }
      })
      .fail(function () {
        alert("Terjadi kesalahan pada server.");
      });
  });
});
