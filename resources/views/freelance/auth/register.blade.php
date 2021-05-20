@extends ('frontend/layout.app2')
@section ('title', 'Register')

@section ('content')

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Register</span>
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
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form login-form">
                        <h2>Register</h2>
                        <form action="{{route('aksiregister_vendor')}}" method="post">
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
                                <label for="username">Username <span style="color: red">*</span></label>
                                <input type="text" placeholder="Username" id="username" name="username" value="{{ old('username') ?? $umkm->username ?? '' }}" required>
                            </div>
                            <div class="group-input">
                                <label for="user_email">Email <span style="color: red">*</span></label>
                                <input type="text" placeholder="Email" id="user_email" name="user_email" value="{{ old('user_email') ?? $umkm->user_email ?? '' }}" required>
                            </div>
                            <div class="group-input">
                                <label for="user_phone">Phone <span style="color: red">*</span></label>
                                <input type="text" placeholder="082386464060" id="user_phone" name="user_phone" value="{{ old('user_phone') ?? $umkm->user_phone ?? '' }}" required>
                            </div>
                            <div class="group-input">
                                <label for="user_level">Jenis Mitra <span style="color: red">*</span></label>
                                <select name="user_level" id="user_level" class="form-control @error('user_level') {{ 'is-invalid' }} @enderror">
                                    <option value="Distributor">Distributor</option>
                                    <option value="Agen">Agen</option>
                                    <option value="Sub-Agen">Sub Agen</option>
                                    <option value="Freelance" selected>Freelance</option>
                                </select>
                            </div>
                            <div class="group-input">
                                <label for="user_password">Password <span style="color: red">*</span></label>
                                <input type="password" placeholder="Password" id="user_password" name="user_password" value="{{ old('user_password') ?? $umkm->user_password ?? '' }}">
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
                            <button type="submit" class="site-btn register-btn">REGISTER</button>
                        </form>
                        <div class="switch-login">
                        Silahkan <a href="{{ route('vendor') }}" class="or-login">Login</a> Jika Sudah Punya Akun
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->

    <!-- // Cara Mengambil Kota Berdasarkan Provinsi -->
    <!-- <script>
        $('#prov_id').change(function(e) {
            e.preventDefault();
            var kota_id = '';
            var prov_id = $('#prov_id').val();
            axios.post("{{url('umkm/carikota')}}", {
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
    </script> -->

@endsection