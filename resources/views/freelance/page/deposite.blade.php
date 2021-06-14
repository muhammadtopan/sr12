@extends ('backend/layouts.freelance')
@section ('title', 'Deporsite')

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
                    <li class="breadcrumb-item active">Deposite</li>
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
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Keterangan</label>
                                                <h5>Tarik Dana #21364654464668</h5>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Nominal</label>
                                                <h5>Rp {{ number_format(10000) }}</h5>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Saldo Akhir</label>
                                                <h5>Rp {{ number_format(10000) }}</h5>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Tanggal</label>
                                                <h5>Ini Tanggal</h5></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Keterangan</label>
                                                <h5>Tarik Dana #21364654464668</h5>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Nominal</label>
                                                <h5>Rp {{ number_format(10000) }}</h5>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Saldo Akhir</label>
                                                <h5>Rp {{ number_format(10000) }}</h5>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Tanggal</label>
                                                <h5>Ini Tanggal</h5></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

@endsection