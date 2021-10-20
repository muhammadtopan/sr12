@extends ('frontend/layout.app')
@section ('title', 'Ganti Password')

@section ('content')

    <!-- Change Pass User Section Begin -->
    <div class="register-login-section spad bg-warning">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <lottie-player class="lottie-daftar" src="https://assets1.lottiefiles.com/packages/lf20_pounvezv.json"  background="transparent"  speed="1"  style="width: 450px; height: 450px;"  loop  autoplay></lottie-player>
                </div>  
                <div class="col-lg-6">
                    <div class="login-form">
                        <h3>Masukan Password Baru</h3>
                        <form action="{{ route('change-pass-user') }}" method="post">
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
                            <input type="hidden" name="costumer_email" value="{{ $email }}">
                            <div class="group-input">
                                <label for="costumer_password" class="text-light">Password Baru<span style="color: red">*</span></label>
                                <input type="password" id="costumer_password" class="form-control" placeholder="password" name="costumer_password">
                            </div>
                            <div class="group-input">
                                <label for="costumer_password" class="text-light">Password Baru<span style="color: red">*</span></label>
                                <input type="password" id="password_confirmation" class="form-control" placeholder="konfirmasi password" name="password_confirmation">
                            </div>
                            <button type="submit" class="btn btn-lg btn-success login-btn">Ganti Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Change Pass User Section End -->


@endsection
