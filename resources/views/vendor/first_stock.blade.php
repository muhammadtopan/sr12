@extends ('backend/layouts.app')
@section ('title', 'Rincian Pesanan')

@section ('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Stok Awal</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('vendor') }}">Home</a></li>
                    <li class="breadcrumb-item active">Stok Awal</li>
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
                <div class="card card-success card-outline">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <table id="zero_config" class="table table-bordered table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-center" width=5%;>No</th>
                                            <th class="text-center">Produk</th>
                                            <th class="text-center">Order</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td class="text-center">nama produk</td>
                                                <td class="text-center">jumlah</td>
                                            </tr>
                                    </tbody>
                                </table>
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