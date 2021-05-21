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
                        <span>Login Freelance</span>
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
                <div class="col-lg-4 offset-lg-1">
                    <div class="login-form">
                        <h3>Login Freelance</h3>
                        @if(Session::has('pesan'))
                            <p class="alert alert-info">{{ Session::get('pesan') }}</p>
                        @endif
                        <form action="{{route("login.freelance")}}" method="post">
                            @csrf
                            <div class="group-input">
                                <label for="email">Email <span style="color: red">*</span></label>
                                <input type="email" class="form-control" placeholder="Email" name="user_email">
                            </div>
                            <div class="group-input">
                                <label for="pass">Password <span style="color: red">*</span></label>
                                <input type="password" id="pass_log_id" class="form-control" placeholder="Password" name="user_password">
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
                            Jika Belum Ada Akun Mari <a href="{{ route('register_vendor') }}" class="or-login">daftar</a> Dulu
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1">
                    <div class="register-form login-form">
                        <h3>Daftar Freelance</h3>
                            <form action="{{route("register.freelance")}}" method="post">
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
                            <!-- <div class="switch-login">
                            Silahkan <a href="{{ route('vendor') }}" class="or-login">Login</a> Jika Sudah Punya Akun
                            </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
