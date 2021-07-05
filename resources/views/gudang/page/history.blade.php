@extends ('layouts/gudang')
@section ('title', 'History Gudang')

@section ('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Histori Gudang</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('gudang.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">History</li>
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
                                    <th scope="col">Ongkir</th>
                                    <th scope="col">Total Belanja</th>
                                    <th scope="col">Total Keseluruhan</th>
                                    <th scope="col">Status</th>
                                    <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($history as $h)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>Rp.{{number_format($h->ongkir)}}</td>
                                            <td>Rp.{{number_format($h->total_belanja)}}</td>
                                            <td>Rp.{{number_format($h->total_belanja + $h->ongkir)}}</td>
                                            <td style="text-transform:capitalize">{{$h->status}}</td>
                                            <th>
                                                <a href="{{route("gudang.detail.history", $h)}}" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-search text-white"></i>
                                                </a>
                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody>
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
