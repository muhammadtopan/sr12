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
                                <h4 class="card-title">Data Pesanan Berhasil</h4>
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
                                                <th>Total Harga</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($completed as $c)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$c->nama_lengkap}}</td>
                                                    <td>{{$c->bank_name}}</td>
                                                    <td>{{$c->invoice}}</td>
                                                    <td>{{$c->noresi}}</td>
                                                    <td>Rp.{{number_format($c->combined_price,0,',','.')}}</td>
                                                    <td>
                                                        <a href="{{route("user.barang.sampai.detail", $c->order_id)}}"  data-toggle="tooltip" title="Lihat Detail" class="btn btn-danger btn-sm"><i class="fas fa-search-plus text-white"></i></a>
                                                        @if ($c->order_status == 'sent')
                                                            <button class="btn btn-warning btn-sm" 
                                                                data-toggle="modal" title="Barang Sampai"
                                                                onclick="cekStatus(<?= $c->order_id ?>)"
                                                                data-target="#exampleModalCenter">
                                                                    <i class="fas fa-exclamation text-white px-1"></i>
                                                            </button>
                                                        @else
                                                            <button class="btn btn-success btn-sm" data-toggle="modal" title="Barang Sudah Sampai">
                                                                    <i class="fas fa-check text-white"></i>
                                                            </button>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center p-5">
                    <h4>Apakah barang sudah sampai?</h4>
                    <form action="{{ route('package.arrived') }}" method="POST">
                        @csrf
                        <input type="hidden" name="order_id" id="order_id">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Sesuai Pesanan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function cekStatus(order_id) {
            $('#order_id').val(order_id);
        }
    </script>

@endsection
