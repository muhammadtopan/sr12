@extends ('backend/layouts.app')
@section ('title', 'Dashboard Vendor')

@section ('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Orderan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Orderan</li>
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
                <div class="card card-tabs">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            <strong>{{ session()->get('message') }}</strong>
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                        </div>
                    @endif
                    <div class="card-header bg-dark p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="verifikasi-tab" data-toggle="pill" href="#verifikasi" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Orderan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="belum-verifikasi-tab" data-toggle="pill" href="#belum-verifikasi" role="tab" aria-controls="belum-verifikasi" aria-selected="false">Histori</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-two-tabContent">

                            {{-- Waiting List --}}
                            <div class="tab-pane fade show active" id="verifikasi" role="tabpanel" aria-labelledby="verifikasi-tab">
                                <table id="zero_config" class="table table-bordered table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Orderan</th>
                                            <th>Tanggal</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td class="text-center">
                                                asd
                                            </td>
                                            <td class="text-center">
                                                asd
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

                            {{-- History --}}
                            <div class="tab-pane fade" id="belum-verifikasi" role="tabpanel" aria-labelledby="belum-verifikasi-tab">
                                <table id="zero_config" class="table table-bordered table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Orderan</th>
                                            <th>Tanggal</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td class="text-center">
                                                asd
                                            </td>
                                            <td class="text-center">
                                                asd
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-info my-4">
                                                    <i class="fa fa-edit .text-white"></i>
                                                </button>
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