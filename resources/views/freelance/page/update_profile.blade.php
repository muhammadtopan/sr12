@extends ('backend/layouts.freelance')
@section ('title', 'Data Diri')

@section ('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                {{-- <h1 class="m-0">{{ $active }} freelance</h1> --}}
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('freelance') }}">Home</a></li>
                    <li class="breadcrumb-item active">Data Diri</li>
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
                    <div class="card card-primary card-primary card-outline">
                        <div class="card-body">
                            <form action="{{route("put.freelance.profile.update")}}" method="post">
                                @method("put")
                                @csrf
                                @if(session('errors'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        Sepertinya ada yang salah:
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Nama Lengkap</label>
                                            <input value="{{$vendor->nama_lengkap}}" type="text" name="nama_lengkap" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Username</label>
                                            <input value="{{$user->username}}" type="text" name="username" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="form-label">Email</label>
                                            <input value="{{$user->user_email}}" type="email" name="email" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="group-input  mb-3">
                                            <label for="prov_id">Provinsi</label> 
                                            <select name="prov_id" id="prov_id" class="form-control @error('prov_id') {{ 'is-invalid' }} @enderror">
                                                <option value="">-Pilih Provinsi-</option>
                                                @foreach($prov as $no => $p)
                                                <option {{$p->prov_id === $vendor->prov_id ? "selected" : ""}} value="{{ $p->prov_id }}">
                                                    {{ $p->prov_nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="group-input  mb-3">
                                            <label for="kota_id">Kota/Kabupaten</label>
                                            <select name="kota_id" id="kota_id" class="form-control @error('kota_id') {{ 'is-invalid' }} @enderror">
                                                {{-- <option value="">-Kota-</option> --}}
                                                @foreach ($kota as $k)
                                                    <option
                                                    {{$k->kota_id === $user->kota_id ? "selected" : ""}}
                                                    value="{{$k->kota_id}}">{{$k->kota_nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Alamat Lengkap</label>
                                            <input value="{{$vendor->alamat_lengkap}}" type="text" name="alamat_lengkap" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">NIK</label>
                                            <input value="{{$vendor->nik}}" type="number" name="nik" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">No.Telepon</label>
                                            <input value="{{$user->user_phone}}" type="number" name="no_telpon" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Tanggal Lahir</label>
                                            <input value="{{$vendor->tgl_lahir}}" type="date" name="tgl_lahir" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Pilih Bank</label>
                                            <select name="bank" id="" class="form-control">
                                                <option value="{{null}}" selected disabled>Pilih Bank</option>
                                                <option {{$vendor->bank === "BNI" ? "selected" : ""}} value="BNI">BNI</option>
                                                <option {{$vendor->bank === "BRI" ? "selected" : ""}} value="BRI">BRI</option>
                                                <option {{$vendor->bank === "BCA" ? "selected" : ""}} value="BCA">BCA</option>
                                                <option {{$vendor->bank === "MANDIRI" ? "selected" : ""}}value="MANDIRI">MANDIRI</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Nama Pemilik Rekening</label>
                                            <input value="{{$vendor->nama_pemilik_rekening}}" type="text" name="nama_lengkap_confirmation" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">No.Rekening</label>
                                            <input value="{{$vendor->no_rekening}}" type="number" name="no_rekening" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm">
                                        <i class="fa fa-edit"></i> Simpan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

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
</script>

@endsection
