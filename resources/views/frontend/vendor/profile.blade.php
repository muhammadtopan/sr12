@extends ('backend/layouts.app')

@section ('content')
<div class="card">
    <div class="card-header"><h3>Update Data Vendor</h3></div>
    <div class="card-body">
        <div class="container">
            <form action="{{route("vendor.update.profile")}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label">Nama Lengkap</label>
                            <input
                            value="{{$data !== null ? $data->nama_lengkap : ""}}"
                            name="nama_lengkap" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label">NIK</label>
                            <input
                            value="{{$data !== null ? $data->nik : ""}}"
                            name="nik" type="number" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label">Tanggal Lahir</label>
                            <input
                            value="{{$data !== null ? $data->tgl_lahir : ""}}"
                            name="tgl_lahir" type="date" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label">Alamat Lengkap</label>
                            <input
                            value="{{$data !== null ? $data->alamat_lengkap : ""}}"
                            name="alamat" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label">Foto Mitra</label>
                            <input name="foto_mitra" type="file" class="form-control" {{$data === null ? "required" : ""}}>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label">Selfie Dengan KTP</label>
                            <input name="selfie_ktp" type="file" class="form-control" {{$data === null ? "required" : ""}}>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-label">Bank Yang Digunakan</label>
                            <select name="bank" class="form-control" required>
                                <option value="{{null}}" selected>Pilih Bank</option>
                                <option {{$data !== null && $data->bank === "BRI" ? "selected" : ""}} value="BRI">BRI</option>
                                <option {{$data !== null && $data->bank === "BNI" ? "selected" : ""}} value="BNI">BNI</option>
                                <option {{$data !== null && $data->bank === "BCA" ? "selected" : ""}} value="BCA">BCA</option>
                                <option {{$data !== null && $data->bank === "MANDIRI" ? "selected" : ""}} value="MANDIRI">MANDIRI</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-label">No.Rekening</label>
                            <input
                            value="{{$data !== null ? $data->no_rekening : ""}}"
                            name="no_rekening" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-label">Nama Pemilik Rekening</label>
                            <input
                            value="{{$data !== null ? $data->nama_pemilik_rekening : ""}}"
                            name="pemilik_rekening" type="text" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
