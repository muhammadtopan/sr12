@extends ('layouts/profile-costumer')
@section ('title', 'Pesanan Lunas')

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
                                            <th>Vendor</th>
                                            <th>Nama Bank</th>
                                            <th>Invoice</th>
                                            <th>No.Resi</th>
                                            <th>Total Harga (Sudah Tambah Ongkir)</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($history as $h)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$h->nama_lengkap}}</td>
                                                <td>{{$h->bank_name}}</td>
                                                <td>{{$h->invoice}}</td>
                                                <td>{{$h->noresi}}</td>
                                                <td>Rp.{{number_format($h->combined_price,0,',','.')}}</td>
                                                <td>
                                                    <a href="{{route("user.profile.bayar.detail", $h->order_id)}}" data-toggle="tooltip" title="Lihat Detail" class="btn btn-danger btn-sm"><i class="fas fa-search-plus text-white"></i></a>
                                                </td>
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
