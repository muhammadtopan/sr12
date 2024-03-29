@extends ('layouts/profile-costumer')

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
                            <h4 class="card-title">Data Keranjang Berdasarkan Waktu</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($data as $key => $d)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$d->product_name}}</td>
                                                <td>{{$d->quantity}}</td>
                                                <td>{{$d->selling_price}}</td>
                                                <td>{{$d->total_price}}</td>
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
