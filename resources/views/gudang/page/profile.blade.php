@extends ('layouts/gudang')
@section ('title', 'Profile Gudang')

@section ('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('gudang.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        @if (Session::get("pesan"))
            <div class="alert alert-success" role="alert" id="alert-update">
                {{Session::get("pesan")}}
            </div>
        @endif
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-md-6">
                    <div class="col-md-12">
                        <div class="card card-danger card-outline">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3>
                                        Data {{Session::get("auth")->level}}
                                    </h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{route("gudang.update_profile")}}" method="post">
                                    @method('put')
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="" class="form-label">Nama Mitra</label>
                                            <input type="text" name="nama_gudang"  class="form-control" value="{{$profil->nama_gudang}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="form-label">No.Wa</label>
                                            <input type="number" name="no_wa" id="" class="form-control" value="{{$profil->no_wa}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="form-label">Email</label>
                                            <input type="email" name="email" id="" class="form-control" value="{{$profil->email}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="form-label">NIK</label>
                                            <input type="number" name="nik" id="" class="form-control" value="{{$profil->nik}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="form-label">Tanggal Lahir</label>
                                            <input type="date" name="tanggal_lahir" id="" class="form-control" value="{{$profil->tanggal_lahir}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="form-label">Jenis Kelamin</label>
                                            <select name="kelamin"  class="form-control">
                                                <option value="L" {{$profil->kelamin === "L" ? "selected" : ""}}>Laki - Laki</option>
                                                <option value="P" {{$profil->kelamin === "P" ? "selected" : ""}}>Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Provinsi</label>
                                                    <select name="prov_id" id="prov_id" class="form-control">
                                                        <option value="" selected disabled>Pilih Provinsi</option>
                                                        @foreach ($provinsi as $p)
                                                            <option
                                                            {{(int)$profil->prov_id === (int)$p->prov_id ? "selected" : ""}}
                                                            value="{{$p->prov_id}}">{{$p->prov_nama}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Kota</label>
                                                    <select name="kota_id" id="kota_id" class="form-control">
                                                        <option
                                                        value="" selected disabled>Pilih Kota</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="form-label">Alamat</label>
                                            <input type="text" name="alamat"  class="form-control" value="{{Session::get("auth")->alamat}}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-edit"></i>  Update
                                        </button>
                                    </div>
                                    <input type="hidden" name="mitra_id" id="mitra_id" value="{{Session::get("auth")->kota_id}}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12">
                        <div class="card card-danger card-outline">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3>
                                        Update Password
                                    </h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{route("gudang.update_password")}}" method="post">
                                    @method('put')
                                    @csrf
                                   <div class="modal-body">
                                        <div class="form-group">
                                            <label for="" class="form-label">Password Lama</label>
                                            <input type="password" name="password_lama" class="form-control">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="" class="form-label">Password Baru</label>
                                                    <input type="password" name="password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="" class="form-label">Konfirmasi Password Baru</label>
                                                    <input type="password" name="password_confirmation" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                   </div>
                                    <div class="modal-footer">
                                      <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-edit"></i>  Update
                                        </button>
                                    </div>
                                    <input type="hidden" name="mitra_id" id="mitra_id" value="{{Session::get("auth")->kota_id}}">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card card-danger card-outline">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3>
                                        Update Foto Toko & Selfie KTP
                                    </h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{route("gudang.update_foto")}}" method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                   <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <img id="foto_toko" src="/dokumen/{{Session::get("auth")->photo_toko}}"  alt="Toko" class="img-thumbnail mb-3">
                                                <br/>
                                            </div>
                                            <div class="col-md-6">
                                                <img id="foto_ktp" src="/dokumen/{{Session::get("auth")->selfi_ktp}}"  alt="Selfie" class="img-thumbnail mb-3">
                                                <br/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="" class="form-label">Foto Toko</label>
                                                <div class="input-group mb-3">
                                                    <div class="custom-file">
                                                      <input  type="file" name="photo_toko" class="custom-file-input" id="toko" aria-describedby="inputGroupFileAddon03">
                                                      <label id="toko" class="custom-file-label" for="inputGroupFile03">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="form-label">Foto Selfie KTP</label>
                                                <div class="input-group mb-3">
                                                    <div class="custom-file">
                                                      <input id="ktp" type="file" name="selfi_ktp" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
                                                      <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                   </div>
                                    <div class="modal-footer">
                                      <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-edit"></i>  Update
                                        </button>
                                    </div>
                                    <input type="hidden" name="mitra_id" id="mitra_id" value="{{Session::get("auth")->kota_id}}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
    @include('backend.page.vendor.mitra.script')
    <script>
        let alert = document.getElementById("alert-update")
        let toko = document.getElementById("toko")
        let ktp = document.getElementById("ktp")

        if(alert) {
            setTimeout(() => {
                alert.remove();
            }, 1000);
        }

        toko.addEventListener("change", (e) => {
            let reader = new FileReader()
            reader.onload = (e) => {
                document.getElementById("foto_toko").src = e.target.result
            }
            reader.readAsDataURL(e.target.files[0])
        })

        ktp.addEventListener("change", (e) => {
            let reader = new FileReader()
            reader.onload = (e) => {
                document.getElementById("foto_ktp").src = e.target.result
            }
            reader.readAsDataURL(e.target.files[0])
        })

        addEventListener("DOMContentLoaded", (e) => {
             getKota()
            setTimeout(() => {
                let kota = Array.from(document.querySelectorAll("#kota_id_pilihan"));
                kota.forEach(k => {
                    if(k.value === document.getElementById("mitra_id").value) k.selected = true;
                })
            }, 100);
        })
    </script>
@endsection
