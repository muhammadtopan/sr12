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
                    <div class="card-header bg-dark py-3">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">{{ $order_detail->costumer_name }}</h3>
                            <h3 class="card-title">ID. Invoice {{ $order_detail->invoice }}</h3>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                @if( $order_detail->order_status != 'end' )
                                    <button class="btn btn-info" data-toggle="tooltip" title="Terima Pesanan"><i class="fas fa-vote-yea"></i></button>
                                    <button class="btn btn-secondary" data-toggle="tooltip" title="Resi"><i class="fas fa-paper-plane"></i></button>    
                                    <button class="btn btn-warning" data-toggle="tooltip" title="Cetak Faktur"><i class="fas fa-file-invoice"></i></button>
                                    <button class="btn btn-danger" data-toggle="tooltip" title="Tolak Pesanan"><i class="fas fa-times-circle"></i></button>
                                @else
                                    <button class="btn btn-warning" data-toggle="tooltip" title="Cetak Faktur"><i class="fas fa-file-invoice"></i></button>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top p-3" src="{{ asset('lte/dist/img/product/'.$order_detail->product_image) }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h4>{{ $order_detail->product_name }}</h4>
                                        <p class="card-text">Rp {{ number_format($order_detail->product_price) }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <h3>Rp {{ number_format($order_detail->total_price) }}</h3>
                            </div>
                            <div class="col-md-2">
                                <h5>{{ $order_detail->order_status }}</h5>
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