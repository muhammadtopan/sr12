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
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td class="text-center">nama product</td>
                                                <td class="text-center">13</td>
                                                <td class="text-center">23</td>
                                                <td class="text-center">
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <input type="number" min="0" class="form-control" name="stock_input" id="stock_input" value="0">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">Rp {{ number_format(10000) }}</td>
                                                <!-- <td>
                                                    <button data-input="" class="btn btn-sm btn-danger">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                </td> -->
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td></td>
                                                <td colspan="4">Jumlah</td>
                                                <td class="text-center">Rp {{ number_format(10000) }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="5"> Pesan, jika jumlah pesanan kurang dari yang di harapkan keluarlah pesan pesannan anda nanggung, silahkan tambah beberapa item </td>
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

@endsection