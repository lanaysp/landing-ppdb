(function($) {
    "use strict";
    const domain = document.location.origin;
    const urldata = domain + "/api/meeting/ppdb";

    /****************************** App Calendar ****************************/

    var calendarEl = document.getElementById("calendar");
    $.get(urldata).done(data => {
        const data_meeting = data;

        if (calendarEl) {
            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ["interaction", "dayGrid", "timeGrid", "list"],
                height: "parent",
                header: {
                    left: "prev,next today",
                    center: "title",
                    right: "dayGridMonth,timeGridWeek,timeGridDay,listWeek"
                },
                defaultView: "dayGridMonth",
                defaultDate: document.getElementById('tanggal_now').value,
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                eventMouseEnter: function(info) {
                    $(info.el).attr("id", info.event.id);

                    $("#" + info.event.id).popover({
                        template:
                            '<div class="popover popover-primary" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
                        title: info.event.title,
                        content: info.event.extendedProps.description,
                        placement: "top",
                        html: true
                    });
                    $("#" + info.event.id).popover("show");
                    $(".popover .popover-header").css(
                        "background-color",
                        $(info.el).css("background-color")
                    );
                },
                eventMouseLeave: function(info) {
                    $("#" + info.event.id).popover("hide");
                },
                eventClick: function(info) {
                    var calEvent = info.event;
                    $("#meeting-detail").modal("toggle");
                    $("#judul_meeting").html(calEvent.title);
                    $("#gambar_meet").attr("src",info.event.extendedProps.image);
                    $("#description").html(info.event.extendedProps.description);
                    $("#link").attr("href",domain + '/ppdb/app/meeting/start/' + calEvent.id);
                },

                events: data_meeting
                
            });

            calendar.render();

            function randomString(length, chars) {
                var result = "";
                for (var i = length; i > 0; --i)
                    result +=
                        chars[Math.round(Math.random() * (chars.length - 1))];
                return result;
            }
        }
    });


})(jQuery);
