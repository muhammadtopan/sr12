@extends ('frontend/layout.app')
@section ('title', 'Herbal Skincare')

@section ('content')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Beranda</a>
                        <span>Login Mitra</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_jyqjh5he.json"  background="transparent"  speed="1"  style="width: 400px; height: 400px;" loop autoplay></lottie-player>
                </div>
                <div class="col-lg-6">
                    <div class="blog-details-inner">
                        <div class="blog-detail-title align-middle">
                            <h4>Halaman ini hanya bisa diakses oleh Mitra sudah bergabung di SR12 Spotlight Team.Untuk kamu yang ingin bergabung silahkan membaca <a href="{{ route('partnership')}}">Syarat dan Ketentuan</a> Terlebih dahulu</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

@endsection