@extends ('frontend/layout.app')
@section ('title', 'Register')

@section ('content')

    <!-- Breadcrumb Section Begin -->
    <!-- <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Daftar</span>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->
    <div class="register-login-section pt-0 pb-0 spad">
        <!-- <div class="container"> -->
            <div class="row">
                <div class="col-12">
                    <div class="product-tab pt-3">
                        <div class="tab-item">
                            <ul class="nav col-12" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#tab-1" role="tab">DAFTAR AKUN</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-2" role="tab">DAFTAR MITRA</a>
                                </li>
                                <!-- <li>
                                    <a data-toggle="tab" href="#tab-3" role="tab">Customer Reviews (02)</a>
                                </li> -->
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active border" id="tab-1" role="tabpanel">
                                    <div class="product-content-regis">
                                        <!-- <======================Regis User======================> -->
                                        <!-- <h3 class="text-light text-center pt-4">Daftar Akun Belanjaku</h3> -->
                                        <div class="row">
                                            <div class="col-lg-6 my-5">
                                                <lottie-player class="m-auto" src="https://assets1.lottiefiles.com/packages/lf20_jcikwtux.json"  background="transparent"  speed="1"  style="width: 450px; height: 450px;"  loop  autoplay></lottie-player>
                                            </div>
                                            <div class="col-lg-6 pr-5 my-5">
                                                <div class="register-form login-form">
                                                    <form action="{{route('user.aksiregister')}}" method="post">
                                                    @csrf
                                                        <input type="hidden" name="referal" value="{{request()->referal}}">
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
                                                        <div class="group-input">
                                                            <!-- <label for="costumer_name">Nama <span style="color: red">*</span></label> -->
                                                            <input type="text" placeholder="Nama" id="costumer_name" name="costumer_name" required>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="group-input">
                                                                    <!-- <label for="costumer_email">Email <span style="color: red">*</span></label> -->
                                                                    <input type="email" placeholder="Email" id="costumer_email" name="costumer_email" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="group-input">
                                                                    <!-- <label for="costumer_phone">No. Whatsapp<span style="color: red">*</span></label> -->
                                                                    <input type="number" placeholder="08*********" id="costumer_phone" name="costumer_phone" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="group-input">
                                                                    <!-- <label for="costumer_ttl">Tanggal Lahir <span style="color: red">*</span></label> -->
                                                                    <input type="date" id="costumer_ttl" name="costumer_ttl" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="group-input">
                                                                    <!-- <label for="costumer_gender">Jenis Kelamin <span style="color: red">*</span></label> -->
                                                                    <select name="costumer_gender" id="costumer_gender" class="form-control @error('costumer_gender') {{ 'is-invalid' }} @enderror">
                                                                        <option value="LK" selected>Laki-laki</option>
                                                                        <option value="PR">Perempuan</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="group-input  mb-3">
                                                                    <!-- <label for="prov_id">Provinsi <span style="color: red">*</span></label> -->
                                                                    <select name="prov_id" id="prov_id" class="form-control @error('prov_id') {{ 'is-invalid' }} @enderror">
                                                                        <option value="">-Pilih Provinsi-</option>
                                                                        @foreach($prov as $no => $prov)
                                                                        <option value="{{ $prov->prov_id }}">
                                                                            {{ $prov->prov_nama}}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                    @if(isset($umkm))
                                                                    <script>
                                                                        document.getElementById('prov_id').value =
                                                                            '<?php echo $umkm->prov_id ?>'
                                                                    </script>
                                                                    @endif
                                                                    @error('prov_id')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="group-input  mb-3">
                                                                    <!-- <label for="kota_id">Kota <span style="color: red">*</span></label> -->
                                                                    <select name="kota_id" id="kota_id" class="form-control @error('kota_id') {{ 'is-invalid' }} @enderror">
                                                                        <option value="">-Kota-</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="group-input">
                                                            <!-- <label for="costumer_address">Alamat <span style="color: red">*</span></label> -->
                                                            <input type="text" placeholder="Alamat" id="costumer_address" name="costumer_address" required>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="group-input">
                                                                    <!-- <label for="costumer_password">Password <span style="color: red">*</span></label> -->
                                                                    <input type="password" placeholder="Password" id="costumer_password" name="costumer_password">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="group-input">
                                                                    <!-- <label for="costumer_password_confirmation">Confirm Password <span style="color: red">*</span></label> -->
                                                                    <input type="password" placeholder="Konfirasi Password" id="password_confirmation" name="costumer_password_confirmation">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="group-input gi-check">
                                                            <div class="gi-more">
                                                                <a href="{{ route('partnership') }}" class="forget-pass"> <span style="color: red">*</span> Syarat dan Ketentuan</a>
                                                            </div>
                                                            <div class="gi-more">
                                                                <label for="save-pass">
                                                                    Saya Sudah Baca Syarat dan Ketentuan Gabung Jadi Mitra
                                                                    <input type="checkbox" id="save-pass">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </div>
                                                        </div>   -->
                                                        <button type="submit" class="site-btn register-btn">Daftar Akun Belanjaku</button>
                                                    </form>
                                                    <!-- <div class="switch-login">
                                                    Silahkan <a href="{{ route('vendor') }}" class="or-login">Login</a> Jika Sudah Punya Akun
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade-in border" id="tab-2" role="tabpanel">
                                    <div class="specification-table-regis">
                                        <!-- <h3 class="text-light">Daftar Mitra</h3> -->
                                        <div class="row">
                                            <!-- <======================Regis Mitra======================> -->
                                            <div class="col-lg-6 my-5">
                                                <lottie-player class="m-auto" src="https://assets3.lottiefiles.com/packages/lf20_u8o7BL.json"  background="transparent"  speed="1"  style="width: 450px; height: 450px;"  loop  autoplay></lottie-player>
                                            </div>
                                            <div class="col-lg-6 pr-5">
                                                <div class="register-form login-form my-5">
                                                    <form action="{{ route('regist-mitra')}}" method="post">
                                                        @csrf
                                                        @if(session('errors'))
                                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                                Ada yang salah:
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
                                                            <div class="col-md-12">
                                                                <div class="group-input">
                                                                    <!-- <label for="mitra_name">Nama <span style="color: red">*</span></label> -->
                                                                    <input type="text" placeholder="Nama" id="mitra_name" name="mitra_name" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="group-input">
                                                                    <!-- <label for="mitra_phone">No. Whatsapp <span style="color: red">*</span></label> -->
                                                                    <input type="number" placeholder="08*********" id="mitra_phone" name="mitra_phone" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="group-input">
                                                                    <!-- <label for="mitra_email">Email <span style="color: red">*</span></label> -->
                                                                    <input type="email" placeholder="Email" id="mitra_email" name="mitra_email" required>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="col-md-6">
                                                                <div class="group-input">
                                                                    <label for="ktp_number">No. KTP <span style="color: red">*</span></label>
                                                                    <input type="number" placeholder="no. ktp"   id="ktp_number" name="ktp_number" required>
                                                                </div>
                                                            </div> -->
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="group-input">
                                                                    <!-- <label for="mitra_ttl">Tanggal Lahir <span style="color: red">*</span></label> -->
                                                                    <input type="date" id="mitra_ttl" name="mitra_ttl" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="group-input">
                                                                    <!-- <label for="mitra_gender">Jenis Kelamin <span style="color: red">*</span></label> -->
                                                                    <select name="mitra_gender" id="mitra_gender" class="form-control @error('mitra_gender') {{ 'is-invalid' }} @enderror">
                                                                        <option value="LK" selected>Laki-laki</option>
                                                                        <option value="PR">Perempuan</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="group-input  mb-3">
                                                                    <!-- <label for="prov_idm">Provinsi Domisili<span style="color: red">*</span></label> -->
                                                                    <select name="prov_id" id="prov_idm" class="form-control @error('prov_id') {{ 'is-invalid' }} @enderror">
                                                                        <option value="">-Pilih Provinsi-</option>
                                                                        @foreach($prov2 as $no => $provm)
                                                                        <option value="{{ $provm->prov_id }}">
                                                                            {{ $provm->prov_nama}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="group-input  mb-3">
                                                                    <!-- <label for="kota_idm">Kota/Kabupaten Domisili<span style="color: red">*</span></label> -->
                                                                    <select name="kota_id" id="kota_idm" class="form-control @error('kota_id') {{ 'is-invalid' }} @enderror">
                                                                        <option value="">-Kota-</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="group-input">
                                                            <!-- <label for="mitra_address">Alamat Domisili<span style="color: red">*</span></label> -->
                                                            <input type="text" placeholder="Alamat" id="mitra_address" name="mitra_address" required>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="group-input">
                                                                    <!-- <label for="mitra_password">Password <span style="color: red">*</span></label> -->
                                                                    <input type="password" placeholder="Password" id="mitra_password" name="mitra_password">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="group-input">
                                                                    <!-- <label for="password_confirmation">Confirm Password <span style="color: red">*</span></label> -->
                                                                    <input type="password" placeholder="Konfirmasi Password" id="password_confirmation" name="password_confirmation">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <!-- <div class="group-input">
                                                                    <label for="selfie_ktp">Upload Selfie KTP</label>
                                                                    <div class="custom-file">
                                                                        <input  type="file" name="selfie_ktp" class="custom-file-input" id="selfie_ktp" aria-describedby="inputGroupFileAddon03">
                                                                        <label id="selfie_ktp" class="custom-file-label" style="color: #000000 !important" for="inputGroupFile03">Selfi KTP</label>
                                                                    </div>
                                                                </div> -->
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="group-input mb-3">
                                                                    <!-- <label for="mitra_position">Posisi Mitra<span style="color: red">*</span></label> -->
                                                                    <select name="mitra_position" id="mitra_position" class="form-control @error('kota_id') {{ 'is-invalid' }} @enderror">
                                                                        <option value="">-Posisi-</option>
                                                                        <option value="m">Marketer</option>
                                                                        <option value="r">Reseller</option>
                                                                        <option value="s">Sub-Agen</option>
                                                                        <option value="a">Agen</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="group-input gi-check">
                                                            <div class="gi-more">
                                                                <a href="{{ route('syarat_mitra') }}" class="forget-pass text-light"> <span style="color: red">*</span> Syarat dan Ketentuan</a>
                                                            </div>
                                                            <!-- <div class="gi-more">
                                                                <label for="save-pass">
                                                                    Saya Sudah Baca Syarat dan Ketentuan Gabung Jadi Mitra
                                                                    <input type="checkbox" id="save-pass">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </div> -->
                                                        </div>
                                                        <button type="submit" class="site-btn register-btn">Daftar Mitra</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- </div> -->
    </div>
    <!-- Register Form Section End -->
    @include('frontend.auth_user.register_script')

@endsection
