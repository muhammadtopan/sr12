@extends ('frontend/layout.app')
@section ('title', 'Login')

@section ('content')


    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Beranda</a>
                        <span>Login User</span>
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
                <div class="col-lg-4  offset-lg-1">
                    <div class="login-form">
                        <h3>Login Akun</h3>
                        @if(Session::has('pesan'))
                            <p class="alert alert-info">{{ Session::get('pesan') }}</p>
                        @endif
                        <form action="{{ route('user.aksilogin') }}" method="post">
                            @csrf
                            <div class="group-input">
                                <label for="costumer_email">Email <span style="color: red">*</span></label>
                                <input type="email" id="costumer_email" class="form-control" placeholder="Email" name="costumer_email">
                            </div>
                            <div class="group-input">
                                <label for="costumer_password">Password <span style="color: red">*</span></label>
                                <input type="password" id="costumer_password" class="form-control" placeholder="Password" name="costumer_password">
                            </div>
                            <div class="group-input gi-check">
                                <div class="gi-more">
                                    <!-- <label for="save-pass">
                                        Simpan Password
                                        <input type="checkbox" id="save-pass">
                                        <span class="checkmark"></span>
                                    </label> -->
                                    <a href="#" class="forget-pass">Lupa Password?</a>
                                </div>
                            </div>
                            <button type="submit" class="site-btn login-btn">Masuk</button>
                        </form>
                        <!-- <div class="switch-login">
                            Jika Belum Ada Akun Mari <a href="{{ route('user.register') }}" class="or-login">daftar</a> Dulu
                        </div> -->
                    </div>
                </div>

                <!-- <======================Regis======================> -->

                <div class="col-lg-4 offset-lg-1">
                    <div class="register-form login-form">
                        <h3>Daftar Akun</h3>
                        <form action="{{route('user.aksiregister')}}" method="post">
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