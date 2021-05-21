@extends ('frontend/layout.app')
@section ('title', 'Register')

@section ('content')

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Daftar Akun</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-tab">
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
                                    <div class="product-content">
                                        <div class="row">
                                            <!-- <======================Regis User======================> -->
                                            <div class="col-lg-6 offset-lg-3">
                                                <div class="register-form login-form">
                                                    <h3>Daftar Akun</h3>
                                                    <form action="{{route('user.aksiregister')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="referal" value="{{request()->referal}}">
                                                        @if(session('errors'))
                                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                                Something it's wrong:
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
                                                            <label for="costumer_name">Nama <span style="color: red">*</span></label>
                                                            <input type="text" placeholder="Nama" id="costumer_name" name="costumer_name" required>
                                                        </div>
                                                        <div class="group-input">
                                                            <label for="costumer_email">Email <span style="color: red">*</span></label>
                                                            <input type="email" placeholder="Email" id="costumer_email" name="costumer_email" required>
                                                        </div>
                                                        <div class="group-input">
                                                            <label for="costumer_phone">Phone <span style="color: red">*</span></label>
                                                            <input type="number" placeholder="08*********" id="costumer_phone" name="costumer_phone" required>
                                                        </div>
                                                        <div class="group-input">
                                                            <label for="costumer_ttl">Tanggal Lahir <span style="color: red">*</span></label>
                                                            <input type="date" id="costumer_ttl" name="costumer_ttl" required>
                                                        </div>
                                                        <div class="group-input">
                                                            <label for="costumer_gender">Jenis Kelamin <span style="color: red">*</span></label>
                                                            <select name="costumer_gender" id="costumer_gender" class="form-control @error('costumer_gender') {{ 'is-invalid' }} @enderror">
                                                                <option value="LK" selected>Laki-laki</option>
                                                                <option value="PR">Perempuan</option>
                                                            </select>
                                                        </div>
                                                        <div class="group-input  mb-3">
                                                            <label for="prov_id">Provinsi <span style="color: red">*</span></label>
                                                            <select name="prov_id" id="prov_id" class="form-control @error('prov_id') {{ 'is-invalid' }} @enderror">
                                                                <option value="">-Pilih Provinsi-</option>
                                                                @foreach($prov as $no => $prov)
                                                                <option value="{{ $prov->prov_id }}">
                                                                    {{ $prov->prov_nama}}</option>
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
                                                        <div class="group-input  mb-3">
                                                            <label for="prov_id">Kota <span style="color: red">*</span></label>
                                                            <select name="kota_id" id="kota_id" class="form-control @error('kota_id') {{ 'is-invalid' }} @enderror">
                                                                <option value="">-Kota-</option>
                                                            </select>
                                                        </div>
                                                        <div class="group-input">
                                                            <label for="costumer_address">Alamat <span style="color: red">*</span></label>
                                                            <input type="text" placeholder="Alamat" id="costumer_address" name="costumer_address" required>
                                                        </div>
                                                        <div class="group-input">
                                                            <label for="costumer_password">Password <span style="color: red">*</span></label>
                                                            <input type="password" placeholder="Password" id="costumer_password" name="costumer_password">
                                                        </div>
                                                        <div class="group-input">
                                                            <label for="password_confirmation">Confirm Password <span style="color: red">*</span></label>
                                                            <input type="password" placeholder="Password" id="password_confirmation" name="password_confirmation">
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
                                                        <button type="submit" class="site-btn register-btn">Daftar</button>
                                                    </form>
                                                    <!-- <div class="switch-login">
                                                    Silahkan <a href="{{ route('vendor') }}" class="or-login">Login</a> Jika Sudah Punya Akun
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade border" id="tab-2" role="tabpanel">
                                    <div class="specification-table">
                                        <div class="row">
                                            <!-- <======================Regis Mitra======================> -->
                                            <div class="col-lg-6 offset-lg-3">
                                                <div class="register-form login-form">
                                                    <h3>Daftar Mitra</h3>
                                                    <form action="" method="post">
                                                    @csrf
                                                        @if(session('errors'))
                                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                                Something it's wrong:
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
                                                            <label for="costumer_name">Nama <span style="color: red">*</span></label>
                                                            <input type="text" placeholder="Nama" id="costumer_name" name="costumer_name" required>
                                                        </div>
                                                        <div class="group-input">
                                                            <label for="costumer_email">Email <span style="color: red">*</span></label>
                                                            <input type="email" placeholder="Email" id="costumer_email" name="costumer_email" required>
                                                        </div>
                                                        <div class="group-input">
                                                            <label for="costumer_phone">Phone <span style="color: red">*</span></label>
                                                            <input type="number" placeholder="08*********" id="costumer_phone" name="costumer_phone" required>
                                                        </div>
                                                        <div class="group-input">
                                                            <label for="costumer_ttl">Tanggal Lahir <span style="color: red">*</span></label>
                                                            <input type="date" id="costumer_ttl" name="costumer_ttl" required>
                                                        </div>
                                                        <div class="group-input">
                                                            <label for="costumer_gender">Jenis Kelamin <span style="color: red">*</span></label>
                                                            <select name="costumer_gender" id="costumer_gender" class="form-control @error('costumer_gender') {{ 'is-invalid' }} @enderror">
                                                                <option value="LK" selected>Laki-laki</option>
                                                                <option value="PR">Perempuan</option>
                                                            </select>
                                                        </div>
                                                        <div class="group-input  mb-3">
                                                            <label for="prov_idm">Provinsi <span style="color: red">*</span></label>
                                                            <select name="prov_idm" id="prov_idm" class="form-control @error('prov_id') {{ 'is-invalid' }} @enderror">
                                                                <option value="">-Pilih Provinsi-</option>
                                                                @foreach($prov2 as $no => $provm)
                                                                <option value="{{ $provm->prov_id }}">
                                                                    {{ $provm->prov_nama}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="group-input  mb-3">
                                                            <label for="kota_idm">Kota <span style="color: red">*</span></label>
                                                            <select name="kota_idm" id="kota_idm" class="form-control @error('kota_id') {{ 'is-invalid' }} @enderror">
                                                                <option value="">-Kota-</option>
                                                            </select>
                                                        </div>
                                                        <div class="group-input">
                                                            <label for="costumer_address">Alamat <span style="color: red">*</span></label>
                                                            <input type="text" placeholder="Alamat" id="costumer_address" name="costumer_address" required>
                                                        </div>
                                                        <div class="group-input">
                                                            <label for="costumer_password">Password <span style="color: red">*</span></label>
                                                            <input type="password" placeholder="Password" id="costumer_password" name="costumer_password">
                                                        </div>
                                                        <div class="group-input">
                                                            <label for="password_confirmation">Confirm Password <span style="color: red">*</span></label>
                                                            <input type="password" placeholder="Password" id="password_confirmation" name="password_confirmation">
                                                        </div>
                                                        <div class="group-input gi-check">
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
                                                        </div>
                                                        <button type="submit" class="site-btn register-btn">Daftar</button>
                                                    </form>
                                                    <!-- <div class="switch-login">
                                                    Silahkan <a href="{{ route('vendor') }}" class="or-login">Login</a> Jika Sudah Punya Akun
                                                    </div> -->
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
        </div>
    </div>
    <!-- Register Form Section End -->

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
        $('#prov_idm').change(function(e) {
            e.preventDefault();
            var kota_idm = '';
            var prov_idm = $('#prov_idm').val();
            axios.post("{{url('carikotauser')}}", {
                'prov_id': prov_idm,
            }).then(function(res) {
                console.log(res)
                var kota = res.data.kota
                for (var i = 0; i < kota.length; i++) {
                    kota_idm += "<option value='" + kota[i].kota_id + "'>" + kota[i].kota_nama + "</option>"
                }
                $('#kota_idm').html(kota_idm)
            }).catch(function(err) {
                console.log(err);
            })
        });
    </script>
@endsection
