(function($) {
    "use strict";
    var note;

    $(".scrollertodo").slimScroll({
        height: "530px",
        color: "#fff"
    });

    $(".note-label li a").on("click", function() {
        $(".notes .note").hide();
        $("." + $(".notes-menu li a.active").data("notetype") + "." + $(this).data("label")).show(500);
        return false;
    });

    $(".notes-menu li a").on("click", function() {
        $(".notes-menu li a").removeClass("active");
        $(this).addClass("active");
        $(".notes .note").hide();
        $("." + $(this).data("notetype")).show(500);
        return false;
    });

    $(".notes").on("click", ".delete-note", function() {
        var id = $(this).attr("data-id");
        var url = "/ppdb/app/information/delete-mading/" + id;
        $(this)
            .closest(".note")
            .slideUp(550, function() {
                $(this)
                    .closest(".note")
                    .remove();
            })
            .load(url);
        event.preventDefault();
    });

   
})(jQuery);
