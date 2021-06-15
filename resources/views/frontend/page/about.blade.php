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
                        <span>Tentang Kami</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->
    
    <section class="mt-3 set-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 set-bg" data-setbg="{{ asset('frontend/img/logo.png')}}">
                    <!-- <div class="logo-about">
                        <a href="#"><img src="{{ asset('frontend/img/logo.png') }}" alt=""></a>
                    </div> -->
                </div>
                <div class="col-lg-5">
                    <h4><b>SR12 HERBAL SKINCARE</b></h4>
                    <div class="ml-4">
                        <ul>
                            <p class="mb-1">Perusahaan yang bergerak di Bidang Herbal dan Skincare</p>
                            <p class="mb-1">Produk dalam Negri</p>
                            <p class="mb-1">Manfaat produk spesifik sesuai kebutuhan (masalah dan jenis kulit)</p>
                            <p class="mb-1">Sudah terdaftar BPOM</p>
                            <p class="mb-1">Bebas dari Mercury & Hydroquinon</p>
                            <p class="mb-1">Mitra tersebar di seluruh Indonesia</p>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5">
                    <h4><b>Skin Relieve 12 masalah kulit :</b></h4>
                    <div class="row">
                        <div class="col-md-5 ml-4">
                            <p class="mb-1">Kulit Kusam</p>
                            <p class="mb-1">Mata Panda</p>
                            <p class="mb-1">Kulit Berminyak</p>
                            <p class="mb-1">Kulit Bruntus</p>
                            <p class="mb-1">Kulit Berjerawat</p>
                            <p class="mb-1">Noda Bekas</p>
                        </div>
                        <div class="col-md-5 ml-4">
                            <p class="mb-1">Kulit Berflex Hitam</p>
                            <p class="mb-1">Komedo</p>
                            <p class="mb-1">Kulit Kering</p>
                            <p class="mb-1">Kulit Kendur</p>
                            <p class="mb-1">Kulit Keriput</p>
                            <p class="mb-1">Stretch Mark</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection