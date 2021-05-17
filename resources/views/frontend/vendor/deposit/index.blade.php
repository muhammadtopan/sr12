@extends ('backend/layouts.app')
@section ('title', 'Deposit')

@section ('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <div class="col-12">
                    <h1>BRI - 123456789</h1>
                </div>
                <div class="col-12">
                    <h5>Sisa Saldo Anda : <span>Rp {{number_format(1000)}}</span></h5>
                </div>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Histori Deposit</li>
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
                <div class="card">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            <strong>{{ session()->get('message') }}</strong>
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                        </div>
                    @endif
                    <div class="card-header bg-dark">
                        <h3 class="card-title">Histori Deposit</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <button class="btn btn-info mb-2"><i class="fas fa-dollar-sign"></i>Tarik Dana</button>
                            </div>
                            <div class="col-lg-12">
                                <table id="zero_config" class="table table-bordered table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Kredit</th>
                                            <th>Debit</th>
                                            <th>Saldo</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">ini tanggal</td>
                                            <td class="text-center">
                                                Rp {{number_format(120000)}}
                                            </td>
                                            <td class="text-center">
                                            Rp {{number_format(120000)}}
                                            </td>
                                            <td class="text-center">
                                            Rp {{number_format(120000)}}
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('vendor.order.details') }}" class="btn btn-sm btn-info my-4">
                                                    <i class="fa fa-edit .text-white"></i>
                                                </a>
                                            </td>
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