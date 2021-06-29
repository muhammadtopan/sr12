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
                    <button data-input="" class="btn btn-sm btn-danger mb-2" data-toggle="modal" data-target=".bd-example-modal-lg">
                        <i class="fa fa-plus"> Tambah Mitra</i>
                    </button>
                    <div class="card card-danger card-outline">
                        <div class="card-body">
                            <table id="zero_config" class="table table-striped">
                                <thead>
                                    <tr>
                                    <th scope="col" style="width: 5%">No</th>
                                    <th scope="col">Mitra</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" style="width: 5%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scop="row">1</th>
                                        <td>Topan</td>
                                        <td>Agen</td>
                                        <td>
                                            <button data-input="" class="btn btn-sm btn-danger">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
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


    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="mitra_name" class="col-form-label">Nama Mitra:</label>
                            <input type="text" class="form-control" id="mitra_name">
                        </div>
                        <div class="form-group">
                            <label for="mitra_wa" class="col-form-label">No. Whatsapp:</label>
                            <input type="text" class="form-control" id="mitra_wa">
                        </div>
                        <div class="form-group">
                            <label for="mitra_email" class="col-form-label">Email:</label>
                            <input type="text" class="form-control" id="mitra_email">
                        </div>
                        <div class="form-group">
                            <label for="mitra_ktp" class="col-form-label">No. KTP:</label>
                            <input type="text" class="form-control" id="mitra_ktp">
                        </div>
                        <div class="form-group">
                            <label for="mitra_ttl" class="col-form-label">Tanggal Lahir:</label>
                            <input type="text" class="form-control" id="mitra_ttl">
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control select2" style="width: 100%;">
                                <option selected="selected">Laki-laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kota</label>
                            <select class="form-control select2" style="width: 100%;">
                                <option selected="selected">ini kota</option>
                                <option>kota2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Provinsi</label>
                            <select class="form-control select2" style="width: 100%;">
                                <option selected="selected">Ini Provinsi</option>
                                <option>Provinsi2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat_mitra" class="col-form-label">Alamat Lengkap:</label>
                            <textarea class="form-control" id="alamat_mitra"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="foto_toko" class="col-form-label">Foto Toko (tampak depan):</label>
                            <input type="file" class="form-control" id="foto_toko">
                        </div>
                        <div class="form-group">
                            <label for="selfi_ktp" class="col-form-label">Upload selfi KTP:</label>
                            <input type="file" class="form-control" id="selfi_ktp">
                        </div>  
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                        <button type="button" class="btn btn-danger">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection