@extends ('frontend/layout.app')
@section ('title', 'Login Akun Belanja Ku')

@section ('content')

    <!-- Breadcrumb Section Begin -->
    <!-- <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Beranda</a>
                        <span>Login Akun Belanjaku</span>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->
    <div class="register-login-section spad bg-warning">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <lottie-player class="lottie-daftar m-auto" src="https://assets1.lottiefiles.com/packages/lf20_pounvezv.json"  background="transparent"  speed="1"  style="max-width: 450px; "  loop  autoplay></lottie-player>
                </div>
                <div class="col-lg-6">
                    <div class="login-form">
                        <h3>Login Akun Belanjaku</h3>
                        @if(Session::has('pesan'))
                            <p class="alert alert-info">{{ Session::get('pesan') }}</p>
                        @endif
                        <form action="{{ route('user.aksilogin') }}" method="post">
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
                            <div class="group-input">
                                <label for="costumer_email" class="text-light">Email <span style="color: red">*</span></label>
                                <input type="email" id="costumer_email" class="form-control" placeholder="Email" name="costumer_email">
                            </div>
                            <div class="group-input">
                                <label for="costumer_password" class="text-light">Password <span style="color: red">*</span></label>
                                <input type="password" id="costumer_password" class="form-control" placeholder="Password" name="costumer_password">
                            </div>
                            <div class="group-input gi-check">
                                <div class="gi-more">
                                    <!-- <label for="save-pass">
                                        Simpan Password
                                        <input type="checkbox" id="save-pass">
                                        <span class="checkmark"></span>
                                    </label> -->
                                    <a href="#" data-toggle="modal" data-target="#exampleModalCenter" class="forget-pass text-light">Lupa Password?</a>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-lg btn-success login-btn">Masuk</button>
                        </form>
                        <!-- <div class="switch-login">
                            Jika Belum Ada Akun Mari <a href="{{ route('user.register') }}" class="or-login">daftar</a> Dulu
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body inner-header bg-modal-search">
                    @if(Session::has('messages'))
                        <p class="alert alert-info">{{ Session::get('messages') }}</p>
                    @endif
                    <h3 class="text-center text-light">Lupa Password?</h3>
                    <label class="text-light">Silahkan masukan email untuk verifikasi</label>
                    <div class="newslatter-item">
                        <form action="{{ route('forget-pass-user') }}" method="post" class="subscribe-form">
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
                            
                            <!-- <div class="form-group"> -->
                                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                            <!-- </div> -->
                            <!-- <div class="text-center"> -->
                                <button type="submit">Kirim</button>
                            <!-- </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let message = "{{session("message")}}"
        message === "Akun Berhasil Dibuat" && sessionStorage.getItem("referal") !== undefined
        ? sessionStorage.removeItem("referal")
        : ""
    </script>

@endsection
