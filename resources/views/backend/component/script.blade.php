<!-- Bootstrap -->
{{-- <script src="https://unpkg.com/axios@0.21.1/dist/axios.min.js"></script> --}}
<script src="{{asset('lte/build/js/axios.min.js')}}"></script>
<script src="{{asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE -->
<script src="{{asset('lte/dist/js/adminlte.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('lte/plugins/summernote/summernote-bs4.min.js')}}"></script>

<!-- DataTables  & Plugins -->
<script src="{{asset('lte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('lte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('lte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('lte/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('lte/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('lte/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('lte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('lte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('lte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('lte/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('lte/dist/js/demo.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Date range picker -->
<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
<script>
    $(function() {
        // Summernote
        $('#summernote').summernote()

        // Summernote Testing
        $('.summernote').summernote()

        // CodeMirror
        // CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        //     mode: "htmlmixed",
        //     theme: "monokai"
        // });
    })
</script>
<script>
    $('#zero_config').DataTable();
</script>
