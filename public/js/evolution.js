// Create Subcriber
var emailSub = null;

if (
    $(".sendSubcribe").click(function () {
        var emailSub = $("#emailSub").val();
        const domain = document.location.origin;
        var urlSubcribe = domain + "/send-subcriber";

        $.post(urlSubcribe, {
            _token: $("meta[name=csrf-token]").attr("content"),
            email: emailSub,
        })
            .done(function () {
                toastr.success("Anda berhasil berlangganan", "Berhasil", {
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    positionClass: "toast-top-right",
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "100",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1,
                });
                $("#emailSub").val("");
            })
            .fail(function () {
                toastr.error(
                    "Pastikan Anda Mengisi Email",
                    "Terjadi kesalahan",
                    {
                        positionClass: "toast-top-right",
                        timeOut: 5e3,
                        closeButton: !0,
                        debug: !1,
                        newestOnTop: !0,
                        progressBar: !0,
                        preventDuplicates: !0,
                        onclick: null,
                        showDuration: "100",
                        hideDuration: "1000",
                        extendedTimeOut: "1000",
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        tapToDismiss: !1,
                    }
                );
            });
    })
);

// Create Comment
var KomentarIsi = null;
if (
    $(".sendComment").click(function () {
        var KomentarIsi = $("#isiComment").val();
        var idNews = $("#berita").data("berita");
        const domain = document.location.origin;
        var urlComment = domain + "/send-komentar";

        $.post(urlComment, {
            _token: $("meta[name=csrf-token]").attr("content"),
            comment_description: KomentarIsi,
            news_id: idNews,
        })
            .done(function () {
                toastr.success("Komentar Berhasil dikirimkan", "Berhasil", {
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    positionClass: "toast-top-right",
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "100",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1,
                });
                $("#isiComment").val("");
                $("#counterComment").load(domain + "/live-newsCount/" + idNews);
                $("#commentList").load(domain + "/live-listComment/" + idNews);
            })
            .fail(function () {
                toastr.error(
                    "Pastikan isi komentar diisi",
                    "Terjadi kesalahan",
                    {
                        positionClass: "toast-top-right",
                        timeOut: 5e3,
                        closeButton: !0,
                        debug: !1,
                        newestOnTop: !0,
                        progressBar: !0,
                        preventDuplicates: !0,
                        onclick: null,
                        showDuration: "100",
                        hideDuration: "1000",
                        extendedTimeOut: "1000",
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        tapToDismiss: !1,
                    }
                );
            });
    })
);

// Send Contact Message
var contactName = null;
var contactEmail = null;
var contactPhone = null;
var contactSubject = null;
var contactDetail = null;
var contactAddress = null;
if (
    $(".contactSending").click(function () {
        var contactName = $("#contactName").val();
        var contactEmail = $("#contactEmail").val();
        var contactPhone = $("#contactPhone").val();
        var contactSubject = $("#contactSubject").val();
        var contactDetail = $("#contactDetail").val();
        var contactAddress = $("#contactAddress").val();
        const domain = document.location.origin;
        var urlContact = domain + "/send-contact";

        $.post(urlContact, {
            _token: $("meta[name=csrf-token]").attr("content"),
            contact_name: contactName,
            contact_email: contactEmail,
            contact_phone: contactPhone,
            contact_subject: contactSubject,
            contact_detail: contactDetail,
            contact_address: contactAddress,
        })
            .done(function () {
                toastr.success("Pesan Anda Berhasil dikirim", "Berhasil", {
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    positionClass: "toast-top-right",
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "100",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1,
                });
                $("#contactName").val("");
                $("#contactEmail").val("");
                $("#contactPhone").val("");
                $("#contactSubject").val("");
                $("#contactDetail").val("");
                $("#contactAddress").val("");
            })
            .fail(function () {
                toastr.error(
                    "Pastikan seluruh form diisi",
                    "Terjadi kesalahan",
                    {
                        positionClass: "toast-top-right",
                        timeOut: 5e3,
                        closeButton: !0,
                        debug: !1,
                        newestOnTop: !0,
                        progressBar: !0,
                        preventDuplicates: !0,
                        onclick: null,
                        showDuration: "100",
                        hideDuration: "1000",
                        extendedTimeOut: "1000",
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        tapToDismiss: !1,
                    }
                );
            });
    })
);
