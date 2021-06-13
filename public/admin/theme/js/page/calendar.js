const domain = document.location.origin;
document.addEventListener("DOMContentLoaded", function() {
    var calendarEl = document.getElementById("calendar");

    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: "prevYear,prev,next,nextYear today",
            center: "title",
            right: "dayGridMonth,dayGridWeek,dayGridDay"
        },
        initialDate: document.getElementById("this-date").value,
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        dayMaxEvents: true, // allow "more" link when too many events
        events: {
            url: domain + "/api/meeting/data"
        },
        eventClick: function(info) {
            info.jsEvent.preventDefault();

            $(info.event.url).modal();
        },
    });

    calendar.render();
});

