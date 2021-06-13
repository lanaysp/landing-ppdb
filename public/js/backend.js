"use strict";
const domain = document.location.origin;
const newsID = $(".news").data("news");

var urlVisitor = domain + "/api/admin/news-analytic/" + newsID;

$(function() { 
    newsDetail();
});

function newsDetail() {
    $.get(urlVisitor).done(data => {
        const detailBerita = data;

        // For Visitor Analytic
        const tanggal = detailBerita.visitor.map(function(e) {
            return e.tanggal;
        });

        const total = detailBerita.visitor.map(function(e) {
            return e.jumlah;
        });

        // For Comment
        const tanggalKomentar = detailBerita.komentar.map(function(e) {
            return e.tanggal;
        });

        const totalKomentar = detailBerita.komentar.map(function(e) {
            return e.jumlah;
        });

        // For Perangkat Digunakan
        const totalViewer = detailBerita.perangkat.map(function(e) {
            return e.jumlah;
        });

        const namaPerangkat = detailBerita.perangkat.map(function(e) {
            return e.perangkat;
        });

        // Analtyc Visitor
        var options = {
            chart: {
                height: 350,
                type: "line",
                shadow: {
                    enabled: false,
                    color: "#bbb",
                    top: 3,
                    left: 2,
                    blur: 3,
                    opacity: 1
                }
            },
            stroke: {
                width: 7,
                curve: "smooth"
            },
            series: [
                {
                    name: "Viewer",
                    data: total
                }
            ],
            xaxis: {
                type: "datetime",
                categories: tanggal,
                labels: {
                    style: {
                        colors: "#8e8da4"
                    }
                }
            },
            title: {
                text: "Analytic Pengunjung",
                align: "left",
                style: {
                    fontSize: "16px",
                    color: "#666"
                }
            },
            fill: {
                type: "gradient",
                gradient: {
                    shade: "dark",
                    gradientToColors: ["#FDD835"],
                    shadeIntensity: 1,
                    type: "horizontal",
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 100, 100, 100]
                }
            },
            markers: {
                size: 4,
                opacity: 0.9,
                colors: ["#FFA41B"],
                strokeColor: "#fff",
                strokeWidth: 2,

                hover: {
                    size: 7
                }
            },
            yaxis: {
                min: -10,
                max: 40,
                title: {
                    text: "Viewer Blog or School News"
                },
                labels: {
                    style: {
                        color: "#8e8da4"
                    }
                }
            }
        };
        var chart = new ApexCharts(document.querySelector("#visitor"), options);
        chart.render();
        // Analytic Visitor End

        // Analytic Komentar Start
        var options = {
            chart: {
                height: 350,
                type: "line"
            },
            series: [
                {
                    name: "Komentar website",
                    type: "column",
                    data: totalKomentar
                }
            ],
            stroke: {
                width: [0, 4]
            },
            title: {
                text: "Traffic Sources"
            },
            // labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            labels: tanggalKomentar,
            xaxis: {
                type: "datetime",
                labels: {
                    style: {
                        colors: "#8e8da4"
                    }
                }
            },
            yaxis: [
                {
                    title: {
                        text: "Komentar Masuk"
                    },
                    labels: {
                        style: {
                            color: "#8e8da4"
                        }
                    }
                }
            ]
        };
        var chart = new ApexCharts(
            document.querySelector("#komentars"),
            options
        );
        chart.render();
        // Analytic Komentar End

        // Analytic Gadget
        var options = {
            chart: {
                width: 360,
                type: "pie"
            },
            labels: namaPerangkat,
            series: totalViewer,
            responsive: [
                {
                    breakpoint: 1000,
                    options: {
                        chart: {
                            width: 400
                        },
                        legend: {
                            position: "bottom"
                        }
                    }
                }
            ]
        };
        var chart = new ApexCharts(
            document.querySelector("#perangkat"),
            options
        );
        chart.render();
        // Analytic Gadget End
    });
}
