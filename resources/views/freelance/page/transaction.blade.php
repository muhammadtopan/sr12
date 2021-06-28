@extends ('backend/layouts.freelance')
@section ('title', 'Riwayat Transaksi')

@section ('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('freelance') }}">Home</a></li>
                    <li class="breadcrumb-item active">Riwayat Transaksi</li>
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
                            <div class="card-header">
                                <h4 class="card-title">Riwayat Dana Masuk</h4>
                            </div>
                            @foreach ($transaksi as $t)
                                <div class="card-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label>Keterangan</label>
                                                    <h5>Dana Masuk <br/> #{{$t->action_code}}</h5>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Nominal</label>
                                                    <h5>Rp {{ number_format($t->kredit) }}</h5>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Saldo Akhir</label>
                                                    <h5>Rp {{ number_format($t->saldo) }}</h5>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Tanggal</label>
                                                    <h5>{{Str::limit($t->created_at, 10, "")}}</h5></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

@endsection
