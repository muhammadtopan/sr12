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
                            <h4 class="card-title">Data Pesanan Yang Telah Dibayar</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="zero_config" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Barang</th>
                                            <th>Nama Bank</th>
                                            <th>Invoice</th>
                                            <th>No.Resi</th>
                                            <th>Total Harga (Sudah Tambah Ongkir)</th>
                                            <th>Total Harga (Hanya Barang)</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($detail as $h)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$h->product_name}}</td>
                                                <td>{{$h->bank_name}}</td>
                                                <td>{{$h->invoice}}</td>
                                                <td>{{$h->noresi}}</td>
                                                <td>Rp.{{number_format($h->combined_price)}}</td>
                                                <td>Rp.{{number_format($h->total_price)}}</td>
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
