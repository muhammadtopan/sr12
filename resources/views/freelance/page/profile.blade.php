@extends ('backend/layouts.freelance')
@section ('title', 'Data Diri')

@section ('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ $active }} freelance</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('freelance') }}">Home</a></li>
                    <li class="breadcrumb-item active">Data Diri</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-primary card-outline">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Link Toko</p>
                                    <div class="input-group mb-3">
                                        <div class="input-group">
                                            <input type="text" class="form-control" disabled value="ini link">
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-info btn-flat">Salin</button>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <div class="col-md-6">
                                    <p>Link Daftar</p>
                                    <div class="input-group mb-3">
                                        <div class="input-group">
                                            <input type="text" class="form-control" disabled value="ini link">
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-info btn-flat">Salin</button>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="img-fluid img-circle"
                                    src="{{asset('lte/dist/img/a.jpg')}}"
                                    alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center">Nama</h3>

                            <p class="text-muted text-center">Username</p>

                            <a href="#" class="btn btn-primary btn-block"><i class="fa fa-image"></i> <b>Ubah Foto</b></a>
                            <a href="#" class="btn btn-warning btn-block"><i class="fa fa-key"></i> <b>Ubah Sandi</b></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Nama Lengkap</label>
                                    <h5>Nama</h5>
                                    <label>Email</label>
                                    <h5>email@email.com</h5>
                                    <label>No. HP</label>
                                    <h5>0813654648</h5>
                                    <label>Tanggal Lahir</label>
                                    <h5>05-05-2002</h5>
                                    <label>Alamat Lengkap</label>
                                    <h5>Ini Alamat</h5>
                                    <a href="#" class="btn btn-info btn-block"><i class="fa fa-user"></i> <b>Ubah Data Diri</b></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

@endsection