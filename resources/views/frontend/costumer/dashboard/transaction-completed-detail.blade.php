@extends ('layouts/profile-costumer')
@section ('title', 'Pesanan Sampai')

@section('content')

    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12">
                    <div class="info-box card-danger card-outline">
                      <div class="info-box-content">
                        <div class="card-header">
                            <h4 class="card-title">Detail Data Pesanan Berhasil</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="zero_config" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Nama Barang</th>
                                            <th>Banyak</th>
                                            <th>Harga</th>
                                            <th>Total Harga</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($detail as $h)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$h->product_name}}</td>
                                                <td>{{$h->quantity}}</td>
                                                <td>Rp {{number_format($h->capital_price,0,',','.')}}</td>
                                                <td>Rp {{number_format($h->total_price,0,',','.')}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                      </div>

                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->

@endsection
