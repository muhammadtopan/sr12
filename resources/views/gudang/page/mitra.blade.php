@extends ('layouts/gudang')
@section ('title', 'Mitra Gudang')

@section ('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">

                <h1 class="m-0">Mitra Gudang</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('gudang.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Mitra</li>
                    @if (Session::get("bread") !== null)
                    @foreach (Session::get("bread") as $b)
                            <li class="breadcrumb-item active">{{$b}}</li>
                        @endforeach
                    @endif
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
                    @if (request()->is("gudang/mitra"))
                        <button data-input="" class="btn btn-sm btn-danger mb-2" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-plus"> Tambah Mitra</i>
                        </button>
                    @endif
                    <div class="card card-danger card-outline">
                        <div class="card-body">
                            <table id="zero_config" class="table table-striped" style="text-transform: capitalize">
                                <thead>
                                    <tr>
                                    <th scope="col" style="width: 5%">No</th>
                                    <th scope="col">Mitra</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" style="text-align: center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mitra as $m)
                                        <tr>
                                            <th scop="row">{{$loop->iteration}}</th>
                                            <td>{{$m->nama_gudang}}</td>
                                            <td>{{$m->level}}</td>
                                            <td  style="text-align: center">
                                                <div class="row">
                                                    @if ($m->id_leader === Session::get("auth")->id_gudang)
                                                        <div class="col-md-4">
                                                            <a
                                                            onclick="return confirm('Apakah Yakin Akan Menghapus Data Ini ??')"
                                                            href="{{route("gudang.delete",$m)}}" class="btn btn-sm btn-danger text-white">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <a href="" class="btn btn-sm btn-danger">
                                                                <i class="fa fa-edit text-white"></i>
                                                            </a>
                                                        </div>
                                                    @endif
                                                    <div class=" {{$m->id_leader === Session::get("auth")->id_gudang ? 'col-md-4':'col-md-12'}} ">
                                                        <a href="{{route("gudang.inivite.detail",$m)}}" class="btn btn-sm btn-danger">
                                                            <i class="fa fa-search text-white"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
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


    @if (request()->is("gudang/mitra"))
        @include('backend.page.vendor.mitra.modal_mitra')
        @include('backend.page.vendor.mitra.script')
    @endif
@endsection
