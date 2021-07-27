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
            <div class="col-6">
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-ticket-alt"></i> Edit Data Voucher</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{route("voucher.edit",$v)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("put")
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Nama Voucher</label>
                                    <input type="text" name="nama_voucher" id="" class="form-control" value="{{$v->nama_voucher}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Item</label>
                                    <input type="text" name="item" id="" class="form-control" value="{{$v->item}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="form-label">Jumlah Point</label>
                                    <input type="number" name="jumlah_point" class="form-control" value="{{$v->jumlah_point}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Deskripsi Voucher</label>
                            <textarea name="deskripsi_voucher" id="" cols="30" rows="10" class="form-control">{{$v->deskripsi_voucher}}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary btn-sm"><i class="fas fa-edit"></i> Update</button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-ticket-alt"></i> Edit Status Voucher</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{route("voucher.status",$v)}}" method="post" enctype="multipart/form-data">
                                @method("put")
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                  <div class="input-group-text">
                                                    <input {{$v->status == "aktif" ? "checked" : ""}} type="radio" aria-label="Checkbox for following text input" name="status" value="aktif">
                                                  </div>
                                                </div>
                                                <input type="text" class="form-control" disabled value="Aktif">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                  <div class="input-group-text">
                                                    <input {{$v->status == "non-aktif" ? "checked" : ""}} type="radio" aria-label="Checkbox for following text input" name="status" value="non-aktif">
                                                  </div>
                                                </div>
                                                <input type="text" class="form-control" disabled value="Non-Aktiff">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-secondary btn-sm"><i class="fas fa-edit"></i> Update</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-ticket-alt"></i> Edit Gambar Voucher</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{route("voucher.gambar",$v)}}" method="post" enctype="multipart/form-data">
                                @method("put")
                                @csrf
                                <div class="form-group">
                                    <label for="" class="form-label">Foto Barang</label>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="foto">
                                          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                      </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-secondary btn-sm"><i class="fas fa-edit"></i> Update</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                        </div>
                    </div>
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
