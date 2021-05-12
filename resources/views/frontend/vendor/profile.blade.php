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
                            <label>Provinsi</label>
                            <select name="prov_id" id="prov_id" class="form-control @error('prov_id') {{ 'is-invalid' }} @enderror">
                                <option value="">-Pilih Provinsi-</option>
                                @foreach($prov as $no => $prov)
                                <option value="{{ $prov->prov_id }}">
                                    {{ $prov->prov_nama}}</option>
                                @endforeach
                            </select>
                            @error('prov_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- <div class="col-md-6">
                        <div class="form-group">
                            <label>Kota</label>
                            <select name="kota_id" id="kota_id" class="form-control @error('kota_id') {{ 'is-invalid' }} @enderror">
                                <option value="">-Pilih Kota-</option>
                            </select>
                        </div>
                    </div> -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kota</label>
                            <select name="kota_id" id="kota_id" class="js-example-basic-single form-control @error('kota_id') {{ 'is-invalid' }} @enderror">
                                <option value="">-Pilih Kota-</option>
                                @foreach ($kota as $k)
                                    <option value="{{$k->kota_id}}">{{$k->kota_nama}}</option>
                                @endforeach
                            </select>
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
<script>
    // Cara Mengambil Kota Berdasarkan Provinsi
    $('#prov_id').change(function(e) {
        e.preventDefault();
        var kota_id = '';
        var prov_id = $('#prov_id').val();
        axios.post("{{ route('carikota') }}", {
            'prov_id': prov_id,
        }).then(function(res) {
            console.log(res.data)
            var kotaa = res.data.kota
            for (var i = 0; i < kotaa.length; i++) {
                kota_id += "<option value='" + kota[i].kota_id + "'>" + kota[i].kota_nama + "</option>"
            }
            $('#kota_id').html(kota_id)
        }).catch(function(err) {
            console.log(err);
        })
    });
</script>
@endsection
