<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin-SR12-Regristrasi</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('lte/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('lte/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Poppins -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    
    <style>
        body{
            font-family: 'Poppins', sans-serif;
        }
        .register-page{
            background-color: #ACE3F2;
        }
        .card{
            background-color: #D4E5EA;
        }
    </style>
</head>

<body class="hold-transition register-page">
    <!-- jQuery Plugins -->
    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('lte/build/js/axios.min.js')}}"></script>

    <div class="register-box">
        <div class="register-logo">
            <img src="{{asset('frontend/img/logo.png')}}" alt="">
            <div>
                <b>REGISTER</b>
            </div>
            <p style="color: #29499C; font-size: 15px">Silahkan daftar untuk membuat akun kamu</p>
        </div>

        <div class="card" style="border-radius: 10px;">
            <div class="card-body register-card-body" style="border-radius: 10px;">

                <form action="{{route('aksiregister')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Nama" name="admin_name" value="{{ old('admin_name') ?? $admin->admin_name ?? '' }}">
                        @error('admin_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="admin_email" value="{{ old('admin_email') ?? $admin->admin_email ?? '' }}">
                        @error('admin_email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="admin_password">
                        @error('admin_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <p style="font-size: 12px">Sudah punya akun ? <a href="{{route('login')}}" style="color: #29499C"><b>Login</b></a></p>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block" style="background-color: #29499C; color: #fff">Daftar</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="{{asset('lte/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('lte/dist/js/adminlte.min.js')}}"></script>
</body>

</html>