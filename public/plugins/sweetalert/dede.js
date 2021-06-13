const flashData = $(".flash-data").data("flashdata");
const gagal = $(".gagal").data("gagal");

if (flashData) {
    Swal.fire({
        icon: "success",
        title: "Success",
        text: "" + flashData,
        showCloseButton: true
    });
}

if (gagal) {
    Swal.fire({
        icon: "error",
        title: "Failed",
        text: "" + gagal,
        showCloseButton: true
    });
}

$(".tombolhapus").on("click", function(e) {
    e.preventDefault();
    const href = $(this).attr("href");
    Swal.fire({
        title: "Apa Anda Yakin ?",
        text: "Data yang dihapus tidak dapat kembali ",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Iya, Saya Yakin !"
    }).then(result => {
        if (result.value) {
            document.location.href = href;
        }
    });
});

$(".tombolpilih").on("click", function(e) {
    e.preventDefault();
    const href = $(this).attr("href");
    Swal.fire({
        title: "Konfirmasi Pemilihan ?",
        text:
            "System Akan Secara Otomatis Mengirim Pesan Pemberitahuan Kepada Pihak Pengguna Terkait Terpilihnya Peserta",
        icon: "success",
        showCancelButton: true,
        confirmButtonColor: "#15810a",
        cancelButtonColor: "#d33",
        confirmButtonText: "Konfirmasi !"
    }).then(result => {
        if (result.value) {
            document.location.href = href;
        }
    });
});

$(".tomboltolak").on("click", function(e) {
    e.preventDefault();
    const href = $(this).attr("href");
    Swal.fire({
        title: "Apa Anda Yakin ?",
        text: "Email akan secara otomatis memberitahu pihak peserta terkait penolakan ini",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Iya, Saya Yakin !"
    }).then(result => {
        if (result.value) {
            document.location.href = href;
        }
    });
});

$(".proses").on("click", function(e) {
    e.preventDefault();
    var href = $(".proses").attr("href");
    let timerInterval;
    Swal.fire({
        title: "Proses Keluar",
        html: "Anda akan keluar dalam beberapa saat.",
        timer: 2000,
        timerProgressBar: true,
        onBeforeOpen: () => {
            Swal.showLoading();
            timerInterval = setInterval(() => {
                const content = Swal.getContent();
                if (content) {
                    const b = content.querySelector("b");
                    if (b) {
                        b.textContent = Swal.getTimerLeft();
                    }
                }
            }, 100);
        }
    }).then(result => {
        window.location.href = href;
    });
});
