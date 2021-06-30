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
                <div class="col-lg-8 offset-lg-1 mx-auto d-block">
                    <div class="login-form">
                        <h3>Login Mitra</h3>
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

            </div>
        </div>
    </div>


@endsection
