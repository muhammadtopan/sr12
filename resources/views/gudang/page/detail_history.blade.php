@extends ('layouts/gudang')
@section ('title', 'History Gudang')

@section ('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Detail Histori Pesanan Gudang</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('gudang.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Detail History</li>
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
                    <div class="card card-danger card-outline">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Product</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Harga Satuan</th>
                                        <th>Status</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($item as $i)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$i->product->product_name}}</td>
                                            <td>{{$i->jumlah}}</td>
                                            <td>Rp.{{number_format($i->product->product_price)}}</td>
                                            <td>{{$i->status}}</td>
                                            <td>Rp.{{number_format($i->jumlah * $i->product->product_price)}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot style="text-transform: capitalize">
                                    <tr>
                                        <td></td>
                                        <td colspan="4" style="font-weight: 700">Total Belanja + Diskon</td>
                                        <td>Rp {{ number_format($total) }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

@endsection
