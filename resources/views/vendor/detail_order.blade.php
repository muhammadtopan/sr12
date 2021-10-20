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
                    <li class="breadcrumb-item"><a href="{{ route('vendor') }}">Home</a></li>
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
                        <div class="d-flex">
                            <h3 class="card-title ml-2 mr-2 ">Total: <br/> Rp {{ number_format($order_detail[0]->combined_price,0,',','.') }}</h3>
                            <h3 class="card-title ml-2 mr-2 ">Status: <br/> {{ $order_detail[0]->order_status }}</h3>
                            <h3 class="card-title ml-2 mr-2 ">Costumer: <br/> {{ $order_detail[0]->costumer_name }}</h3>
                            <h3 class="card-title ml-2 mr-2 ">Invoice: <br/> {{ $order_detail[0]->invoice }}</h3>
                           <br/>
                            <h3 class="card-title ml-2 mr-2 ">Kota: <br/> {{ $order_detail[0]->kota_nama }}</h3>
                            <h3 class="card-title ml-2 mr-2 ">Alamat Lengkap: <br/> {{ $order_detail[0]->costumer_address }}</h3>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                @if( $order_detail[0]->order_status != 'end' )
                                    @if ($order_detail[0]->order_status === "waiting")
                                        <a  class="btn btn-info text-light" data-toggle="tooltip" title="Terima Pesanan" href="{{route("vendor.order.update.status",$order_detail[0]->order_id)}}"><i class="fas fa-vote-yea"></i></a>
                                        <button class="btn btn-danger" data-toggle="tooltip" title="Tolak Pesanan"><i class="fas fa-times-circle"></i></button>
                                    @endif
                                    @if ($order_detail[0]->order_status === "processed")
                                        <button data-toggle="modal" data-target="#exampleModal" class="btn btn-secondary" data-toggle="tooltip" title="Input Nomor Resi"><i class="fas fa-paper-plane"></i></button>
                                    @endif
                                    @if ($order_detail[0]->order_status === "sent")
                                        <a  class="btn btn-success text-light" data-toggle="tooltip" title="Barang Sampai" href="{{route("vendor.order.update.status",$order_detail[0]->order_id)}}"><i class="fas fa-check"></i></a>
                                    @endif
                                @endif
                                    <button class="btn btn-warning" data-toggle="tooltip" title="Cetak Faktur"><i class="fas fa-file-invoice"></i></button>
                                    <button class="btn btn-dark" title="Bukti Transfer" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-file-invoice-dollar"></i></button>
                            </div>
                            @foreach ($order_detail as $od)
                                <div class="col-md-4">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top p-3" src="{{ asset('lte/dist/img/product/'.$od->product_image) }}" alt="Card image cap">
                                        <div class="card-body">
                                            <h4>{{ $od->product_name }} ({{ $od->quantity }})</h4>
                                            <p class="card-text">Rp {{ number_format($od->product_price) }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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

<!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Input Resi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route("vendor.order.update.status",$order_detail[0]->order_id)}}" method="get">
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="" class="form-label">No.Resi</label>
                        <input type="text" name="noresi"  class="form-control">
                    </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Input No.Resi</button>
            </div>
        </form>
      </div>
    </div>
  </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <img style="width: 100%" src="{{ asset('dokumen/'.$order_detail[0]->proof) }}" alt="">
                </div>
            </div>
        </div>
    </div>

@endsection
