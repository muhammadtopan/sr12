@extends ('backend/layouts.app')
@section ('title', 'Rincian Pesanan')

@section ('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Orderan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('vendor.order') }}">Orderan</a></li>
                    <li class="breadcrumb-item active">Rincian Order</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            <strong>{{ session()->get('message') }}</strong>
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                        </div>
                    @endif
                    <div class="card-header bg-dark">
                        <h3 class="card-title">Rincian Orderan</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <button class="btn btn-info"><i class="fas fa-vote-yea"></i></button>
                                <button class="btn btn-secondary"><i class="fas fa-paper-plane"></i></button>
                                <button class="btn btn-warning"><i class="fas fa-file-invoice"></i></button>
                                <button class="btn btn-danger"><i class="fas fa-times-circle"></i></button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection