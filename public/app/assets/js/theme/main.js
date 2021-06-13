$(function () {
  'use strict';

  $('.my-datatables').DataTable({
    "scrollY": "400px",
    "scrollCollapse": true,
    autoFill: true,
    dom: '<"wrapper"<"export-table-btn"B><"d-flex justify-content-between"lf>rtip>',
    buttons: [
      'copy', {
        extend: 'csv',
        "download": "download"
      }, {
        extend: 'excel',
        "download": 'download'
      }, {
        extend: 'pdf',
        text: 'PDF',
        download: 'download',
      }, {
        extend: 'print',
        download: 'download'
      }
    ]
  });

  $('.my-select').select2();

  if ($('.my-datetimepicker').length) {
    $('.my-datetimepicker').datetimepicker({
      format: "yyyy - mm - dd",
      weekStart: 1,
      todayBtn: 1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 2,
      minView: 2,
      forceParse: 0
    });
  }

});