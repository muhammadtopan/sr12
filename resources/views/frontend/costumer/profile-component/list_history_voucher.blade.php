@extends ('layouts/profile-costumer')

@section('content')

    <!-- Content Header (Page header) -->

    <!-- Main content -->

    @if (session("pesan") != null)
        <script>
            alert("{{Session::get('pesan')}}")
        </script>
    @endif

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
                            <a href="{{route('user.profile.voucher.history')}}" class="btn btn-danger btn-sm mb-3 text-white"><i class="fas fa-search-plus"></i> Lihat History Saya</a>
                            <div class="table-responsive">
                                <table class="table table-hover" id="zero_config">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Voucher</th>
                                            <th>Item</th>
                                            <th>Point</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($vouchers as $v)
                                           <tr>
                                               <td>{{$loop->iteration}}</td>
                                               <td>{{$v->nama_voucher}}</td>
                                               <td>{{$v->item}}</td>
                                               <td>{{$v->jumlah_point}}</td>
                                               <td>
                                                   @if ($v->status == "konfirmasi")
                                                        <span class="text-success" style="text-transform: capitalize">{{$v->status}}</span>
                                                    @else
                                                        <span class="text-danger" style="text-transform: capitalize">{{$v->status}}</span>
                                                    @endif
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
