@extends ('backend/layouts.app')
@section ('title', 'Vendor List')

@section ('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Gudang</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Gudang</li>
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
                                <a class="nav-link active" id="verifikasi-tab" data-toggle="pill" href="#verifikasi" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Sudah Verifikasi</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-two-tabContent">
                            <button class="btn btn-lg btn-dark my-4" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-plus"></i>
                            </button>
                            <button class="btn btn-lg btn-success my-4" onclick="location.reload(true);" style="margin-left: 20px;">
                                <i class="fas fa-redo-alt"></i>
                            </button>
                            <div class="tab-pane fade show active" id="verifikasi" role="tabpanel" aria-labelledby="verifikasi-tab">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Vendor</th>
                                            <th>Level</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mitra as $m)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$m->nama_gudang}}</td>
                                                <td>{{$m->level}}</td>
                                                <td class="text-success">Aktif</td>
                                            </tr>
                                        @endforeach
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
<!-- Button trigger modal -->
@include('backend.page.vendor.mitra.modal_mitra')
@include('backend.page.vendor.mitra.script')
@endsection
