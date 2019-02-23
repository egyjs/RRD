<!-- Jquery DataTable Plugin Js -->
<script src="{{ asset('dash/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
<script src="{{ asset('dash/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('dash/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('dash/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
<script src="{{ asset('dash/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
<script src="{{ asset('dash/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
<script src="{{ asset('dash/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
<script src="{{ asset('dash/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
<script src="{{ asset('dash/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>

<script>
    $(function () {
        $('.js-basic-example').DataTable({
            responsive: true
        });

        //Exportable table
        $('.js-exportable').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>