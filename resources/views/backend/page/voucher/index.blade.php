@extends ('backend/layouts.app')
@section ('title', 'Dashboard')

@section ('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">DataTables</li>
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
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-ticket-alt"></i> Daftar Voucher Yang Berlaku Saat Ini</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a href="" class="btn btn-secondary btn-sm mb-3" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-plus"></i> Tambah Voucher
                    </a>
                    <table id="zero_config" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Voucher</th>
                        <th>Tanggal Mulai Berlaku</th>
                        <th>Jumlah Penukaran</th>
                        <th>Jumlah Point Yang Dibutuhkan</th>
                        <th>Status</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                   <tbody>
                       @foreach ($voucher as $v)
                           <tr>
                               <td>{{$loop->iteration}}</td>
                               <td>{{$v->nama_voucher}}</td>
                                <td>{{$v->created_at->diffForHumans()}}</td>
                                <td>{{$v->jumlah_penukaran}}</td>
                                <td>{{$v->jumlah_point}}</td>
                                <td style="text-transform: capitalize;font-weight:700">
                                    @if ($v->status == "aktif")
                                        <span class="text-success">{{$v->status}}</span>
                                    @else
                                        <span class="text-danger">{{$v->status}}</span>
                                    @endif
                                </td>
                                <td>
                                    <img src="/dokumen/{{$v->gambar}}" alt="" class="img-thumbnail w-50">
                                </td>
                                <td>
                                    <a onclick="return confirm('Yakin Akan Menghapus Voucher Ini ?')" href="{{route("voucher.delete",$v)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                    <a href="{{route("voucher.edit",$v)}}" class="btn btn-warning btn-sm text-white mt-2"><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                       @endforeach
                   </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nama Voucher</th>
                        <th>Tanggal Mulai Berlaku</th>
                        <th>Jumlah Penukaran</th>
                        <th>Jumlah Point Yang Dibutuhkan</th>
                        <th>Status</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                    </tfoot>
                    </table>
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

    {{-- Voucher Modal --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Voucher</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="{{route("voucher")}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Nama Voucher</label>
                                    <input type="text" name="nama_voucher" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Item</label>
                                    <input type="text" name="item" id="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Foto Barang</label>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="foto">
                                          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                      </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Jumlah Point</label>
                                    <input type="number" name="jumlah_point" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Deskripsi Voucher</label>
                            <textarea name="deskripsi_voucher" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>

            </div>
            </div>
        </div>
    {{-- Voucher Modal --}}


@endsection
