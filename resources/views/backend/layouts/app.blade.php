<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>SR12 @yield('title')</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('lte/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('lte/plugins/summernote/summernote-bs4.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('lte/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('lte/dist/css/style.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('lte/dist/css/toastr.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<!-- <body class="hold-transition sidebar-mini text-sm"> -->
<body class="sidebar-mini layout-fixed layout-navbar-fixed text-sm">
    <script src="{{asset('lte/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('lte/ckeditor/ckeditor.js')}}"> </script>
    <script src="{{asset('lte/build/js/axios.min.js')}}"></script>
    <script src="{{asset('lte/build/js/toastr.min.js')}}"></script>
    <div class="wrapper">
        @include('backend/component/navbar')

        @include('backend/component/sidebar')

        <div class="content-wrapper">
            @yield('content')
        </div>

        @include('backend/component/footer')
    </div>

    @include('backend/component/script')
</body>

</html>
