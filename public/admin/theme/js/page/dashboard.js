"use strict";
const domain = document.location.origin;
const urldata = domain + "/api/admin/dashboard/thisyear";
$(function() {
    analytictahunan();
});

function analytictahunan() {
    $.get(urldata).done(data => {
        const data_dashboard = data;
        const tanggal_tahunan = data_dashboard.ppdbyear.map(function(e) {
            return e.tanggal;
        });
        const jumlah_tahunan = data_dashboard.ppdbyear.map(function(e) {
            return e.jumlah;
        });
        const persentase = data_dashboard.percentase.map(function(e) {
            return e.jumlah;
        });
        const lulus_tanggal = data_dashboard.ppdbaccept.map(function(e) {
            return e.tanggal;
        });
        const lulus_jumlah = data_dashboard.ppdbaccept.map(function(e) {
            return e.jumlah;
        });
        const tidak_tanggal = data_dashboard.ppdbreject.map(function(e) {
            return e.tanggal;
        });
        const tidak_jumlah = data_dashboard.ppdbreject.map(function(e) {
            return e.jumlah;
        });
        var options = {
            series: [
                {
                    name: "Data Registrasi PPDB",
                    data: jumlah_tahunan
                }
            ],
            chart: {
                height: 350,
                type: "area",
                dropShadow: {
                    enabled: true,
                    opacity: 0.3,
                    blur: 5,
                    left: -7,
                    top: 22
                },
                toolbar: {
                    show: false
                }
            },
            colors: ["#8b31d0"],
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                curve: "smooth",
                width: 3,
                lineCap: "square"
            },
            xaxis: {
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                },
                crosshairs: {
                    show: true
                },
                categories: tanggal_tahunan,
                labels: {
                    offsetX: 0,
                    offsetY: 5,
                    style: {
                        fontSize: "12px",
                        fontFamily: "Segoe UI",
                        cssClass: "apexcharts-xaxis-title"
                    }
                }
            },
            yaxis: {
                labels: {
                    offsetX: 0,
                    offsetY: 0,
                    style: {
                        fontSize: "12px",
                        fontFamily: "Segoe UI",
                        cssClass: "apexcharts-yaxis-title"
                    }
                }
            },
            legend: {
                position: "top",
                horizontalAlign: "right",
                markers: {
                    width: 10,
                    height: 10
                },
                itemMargin: {
                    horizontal: 0,
                    vertical: 20
                }
            },
            tooltip: {
                theme: "dark",
                marker: {
                    show: true
                },
                x: {
                    show: true
                }
            },
            fill: {
                type: "gradient",
                gradient: {
                    type: "vertical",
                    shadeIntensity: 1,
                    inverseColors: !1,
                    opacityFrom: 0.28,
                    opacityTo: 0.05,
                    stops: [45, 100]
                }
            }
        };
        var chart = new ApexCharts(
            document.querySelector("#analytictahunan"),
            options
        );
        chart.render();
        var options = {
            series: [
                {
                    name: "Pendaftaran Bulan Ke Bulan",
                    data: jumlah_tahunan
                }
            ],
            chart: {
                type: "bar",
                height: 350,
                dropShadow: {
                    enabled: true,
                    color: "#000",
                    top: 18,
                    left: 7,
                    blur: 10,
                    opacity: 0.2
                },
                toolbar: {
                    show: false
                }
            },
            colors: ["#5C9FFB"],
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "50%",
                    endingShape: "rounded"
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ["transparent"]
            },
            xaxis: {
                categories: tanggal_tahunan
            },
            yaxis: {
                title: {
                    text: "PPDB REGISTRATION"
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                theme: "dark",
                marker: {
                    show: true
                },
                x: {
                    show: true
                }
            }
        };
        var chart = new ApexCharts(
            document.querySelector("#ppdbmonth"),
            options
        );
        chart.render();
        var options = {
            series: persentase,
            chart: {
                height: 300,
                type: "radialBar",
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                radialBar: {
                    startAngle: -135,
                    endAngle: 225,
                    hollow: {
                        margin: 0,
                        size: "70%",
                        background: "#00ff001C",
                        image: undefined,
                        imageOffsetX: 0,
                        imageOffsetY: 0,
                        position: "front",
                        dropShadow: {
                            enabled: true,
                            top: 3,
                            left: 0,
                            blur: 4,
                            opacity: 0.24
                        }
                    },
                    track: {
                        background: "#fff",
                        strokeWidth: "67%",
                        margin: 0, // margin is in pixels
                        dropShadow: {
                            enabled: true,
                            opacity: 0.3,
                            blur: 6,
                            left: -10,
                            top: 0
                        }
                    },

                    dataLabels: {
                        show: true,
                        name: {
                            offsetY: -10,
                            show: true,
                            color: "#888",
                            fontSize: "17px"
                        },
                        value: {
                            formatter: function(val) {
                                return parseInt(val);
                            },
                            color: "#111",
                            fontSize: "36px",
                            show: true
                        }
                    }
                }
            },
            fill: {
                type: "gradient",
                gradient: {
                    shade: "dark",
                    type: "horizontal",
                    shadeIntensity: 0.5,
                    gradientToColors: ["#ABE5A1"],
                    inverseColors: true,
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 100]
                }
            },
            stroke: {
                lineCap: "round"
            },
            labels: ["Percent"]
        };
        var chart = new ApexCharts(
            document.querySelector("#persentase"),
            options
        );
        chart.render();
        var options = {
            series: [
                {
                    name: "Registrasi Lulus",
                    data: lulus_jumlah
                },
                {
                    name: "Registrasi Tidak Lulus",
                    data: tidak_jumlah
                }
            ],
            chart: {
                height: 300,
                type: "area",
                dropShadow: {
                    enabled: true,
                    opacity: 0.3,
                    blur: 5,
                    left: -7,
                    top: 22
                },
                toolbar: {
                    show: false
                }
            },
            colors: ["#6777EF", "#FEB019"],
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                curve: "smooth",
                width: 3,
                lineCap: "square"
            },
            xaxis: {
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                },
                crosshairs: {
                    show: true
                },
                categories: lulus_tanggal,
                labels: {
                    offsetX: 0,
                    offsetY: 5,
                    style: {
                        fontSize: "12px",
                        fontFamily: "Segoe UI",
                        cssClass: "apexcharts-xaxis-title"
                    }
                }
            },
            yaxis: {
                labels: {
                    offsetX: 0,
                    offsetY: 0,
                    style: {
                        fontSize: "12px",
                        fontFamily: "Segoe UI",
                        cssClass: "apexcharts-yaxis-title"
                    }
                }
            },
            legend: {
                show: false
            },
            tooltip: {
                theme: "dark",
                marker: {
                    show: true
                },
                x: {
                    show: true
                }
            }
        };
        var chart = new ApexCharts(
            document.querySelector("#lulusDantidak"),
            options
        );
        chart.render();
    });
}
