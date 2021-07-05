@extends ('layouts/gudang')
@section ('title', 'RO Gudang')

@section ('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $active }} Gudang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('gudang.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">RO</li>
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
            <input type="hidden" id="level" value="{{Session::get("auth")->level}}">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-danger card-outline card-tabs">
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-two-tabContent">
                                <div class="tab-pane fade show active" id="verifikasi" role="tabpanel" aria-labelledby="verifikasi-tab">
                                    <table id="zero_config" class="table table-bordered table-hover">
                                        <thead class="">
                                            <tr>
                                                <th>No</th>
                                                <th>Product</th>
                                                <th>Stock Tersedia</th>
                                                <th>Stock Leader</th>
                                                <th>RO</th>
                                                <th>Harga</th>
                                                <!-- <th>Pesan</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($stok as $s)
                                                <tr>
                                                    <td class="text-center">{{$loop->iteration}}</td>
                                                    <td class="text-center">{{$s["nama_barang"]}}</td>
                                                    <td class="text-center">{{$s["mitra_stok"]}}</td>
                                                    <td class="text-center">{{$s["leader_stok"]}}</td>
                                                    <td class="text-center">
                                                        <div class="col-lg-3">
                                                            <div class="form-group">
                                                                <input type="number" min="0" class="form-control" name="stock_input" id="stock_input" data-harga="{{$s["harga_barang"]}}" data-id="{{$s["id_barang"]}}" value="0">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">Rp {{ number_format($s["harga_barang"]) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot style="text-transform: capitalize">
                                            <tr>
                                                <td></td>
                                                <td colspan="4">Jumlah Sebelum Diskon  {{Session::get("auth")->level}}</td>
                                                <td id="total_tagihan" class="text-center">Rp {{ number_format(0) }}</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td colspan="4">Jumlah Setelah Diskon {{Session::get("auth")->level}}</td>
                                                <td id="total_tagihan_diskon" class="text-center">Rp {{ number_format(0) }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" id="pesan-alert"> Pesan, jika jumlah pesanan kurang dari yang di harapkan keluarlah pesan pesannan anda nanggung, silahkan tambah beberapa item </td>
                                                <td>
                                                    <button class="col-12 btn btn-danger">Pesan</button>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
    @include('gudang.page.script.ro_script')
@endsection
