@extends ('backend/layouts.freelance')
@section ('title', 'Riwayat Affiliate')

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
                    <li class="breadcrumb-item active">Riwayat Affiliate</li>
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
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="text-center">
                                        <img src="{{asset('lte/dist/img/a.jpg')}}"
                                            alt="User profile picture">
                                    </div>
                                </div>
                                <div class="col-md-2 m-auto">
                                    <label>No. Invoice</label>
                                    <h5>#3213654648</h5>
                                    <label>Status</label>
                                    <h5>Selesai</h5>
                                </div>
                                <div class="col-md-2 m-auto align-middle">
                                    <label>Tanggal Order</label>
                                    <h5>10-05-2021</h5>
                                </div>
                                <div class="col-md-2 m-auto">
                                    <label>Total Harga</label>
                                    <h5>Rp {{ number_format(10000) }}</h5>
                                    <label>Komisi</label>
                                    <h5>Rp {{ number_format(1000) }}</h5>
                                </div>
                                <div class="col-md-2 m-auto">
                                    <a href="#" class="btn btn-primary">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
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