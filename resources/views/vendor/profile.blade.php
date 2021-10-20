@extends ('backend/layouts.app')

@section ('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('vendor') }}">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
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
                                            onchange="namaRekening()"
                                            name="nama_lengkap" id="nama_lengkap" type="text" class="form-control" required>
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
                                    <div class="col-md-6"cart>
                                        <div class="form-group">
                                            <label>Provinsi</label>
                                            <select name="prov_id" id="prov_id" class="js-example-basic-single form-control @error('prov_id') {{ 'is-invalid' }} @enderror">
                                                <option value="">-Pilih Provinsi-</option>
                                                @foreach($prov as $no => $prov)
                                                <option 
                                                    {{ $data ? $prov->prov_id === $data->prov_id ? "selected" : "" : ""}}
                                                value="{{ $prov->prov_id }}">{{ $prov->prov_nama}}</option>
                                                @endforeach
                                            </select>
                                            @error('prov_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Kota</label>
                                            <select name="kota_id" id="kota_id" class="js-example-basic-single form-control @error('kota_id') {{ 'is-invalid' }} @enderror">
                                                <option value="">-Pilih Kota-</option>
                                                @foreach ($kota as $k)
                                                    <option 
                                                    {{ $data ? $k->kota_id === $data->kota_id ? "selected" : "" : ""}}
                                                    value="{{$k->kota_id}}">{{$k->kota_nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Foto Mitra</label>
                                        @php
                                            if($data){
                                                if($data->foto_mitra){
                                        @endphp
                                                    <div class="text-center">
                                                        <img class="photo-image img-fluid" src="{{ asset('dokumen/'.$data->foto_mitra) }}" alt="">
                                                    </div>
                                        @php
                                                }
                                            }
                                        @endphp
                                        <div class="form-group">
                                            <input name="foto_mitra" type="file" class="form-control" {{$data === null ? "required" : ""}}>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Selfie Dengan KTP</label>
                                        @php
                                            if($data){
                                                if($data->selfie_ktp){
                                        @endphp
                                            <div class="text-center">
                                                <img class="photo-image img-fluid" src="{{ asset('dokumen/'.$data->selfie_ktp) }}" alt="">
                                            </div>
                                        @php
                                                }
                                            }
                                        @endphp
                                        <div class="form-group">
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
                                            <label for="pemilik_rekening" class="form-label">Nama Pemilik Rekening</label>
                                            <input
                                            value="{{$data !== null ? $data->nama_pemilik_rekening : ""}}"
                                            name="pemilik_rekening" id="pemilik_rekening" type="text" class="form-control" required readonly>
                                            <span>*rekening harus menggunakan nama pribadi</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</section>
<script>
    // Cara Mengambil Kota Berdasarkan Provinsi
    $('#prov_id').change(function(e) {
        e.preventDefault();
        var kota_id = '';
        var prov_id = $('#prov_id').val();
        axios.post("{{url('carikotauser')}}", {
            'prov_id': prov_id,
        }).then(function(res) {
            console.log(res)
            var kota = res.data.kota
            for (var i = 0; i < kota.length; i++) {
                kota_id += "<option value='" + kota[i].kota_id + "'>" + kota[i].kota_nama + "</option>"
            }
            $('#kota_id').html(kota_id)
        }).catch(function(err) {
            console.log(err);
        })
    });

function namaRekening() {
    let nama = document.getElementById("nama_lengkap").value;
    let rek = document.getElementById('pemilik_rekening').value = nama
    console.log(rek);
}

</script>
@endsection
