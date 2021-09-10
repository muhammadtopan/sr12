@extends ('frontend/layout.app')
@section ('title', 'Tools')

@section ('content')

    <!-- Breadcrumb Section Begin -->
    <!-- <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Beranda</a>
                        <span>Tool</span>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Breadcrumb Form Section Begin -->

    <!-- Syarat Begin -->
    <section class="product-shop spad pb-0">
        <div class="container">
            <div class="row">
                <div class="col-md-3 border">
                    <div class="filter-widget">
                        <h4 class="fw-title">MITRA RESMI SR12</h4>
                        <ul class="ml-3">
                            <li><a href="#" data-toggle="modal" data-target="#exampleModalCenter">BIMBINGAN ONLINE</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#exampleModalCenter">BIMBINGAN OFFLINE</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#exampleModalCenter">HOME SHARING</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#exampleModalCenter">UANG ONLINE</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#exampleModalCenter">TOOL MITRA</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#exampleModalCenter">TOOL REKOMENDASI</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#exampleModalCenter">e-BOOK GRATIS</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#exampleModalCenter">STRATEGI MARKETING</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#exampleModalCenter">JUALAN DI SOSMED</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#exampleModalCenter">SUKSES JADI SELLER</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#exampleModalCenter">PRODUK KNOWLEDGE</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#exampleModalCenter">ROAD MAP BISNIS SR12</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#exampleModalCenter">KURIKULUM MITRA</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9 order-1 order-lg-2">
                    <div class="product-list">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_jyqjh5he.json"  background="transparent"  speed="1"  style="width: 400px; height: 400px;" loop autoplay></lottie-player>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="blog-details-inner">
                                                <div class="blog-detail-title align-middle">
                                                    <h4  class="text-justify">Halaman ini hanya bisa diakses oleh Mitra sudah bergabung di SR12 Spotlight Team. Untuk kamu yang ingin bergabung silahkan membaca <a href="{{ route('belanjaHemat') }}">Syarat dan Ketentuan</a> Terlebih dahulu</h4>
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
    </section>
    <!-- Product Shop Section End -->

    <section class="blog-details spad pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12 blog-details-inner mt-5">
                    <div class="section-title">
                        <h2>Pola dan Bimbingan Dasar Bisnis SR12</h2>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="owl-carousel owl-ilmu-strategi">
                                <div class="item text-center">
                                    <a href="#" data-toggle="modal" data-target="#exampleModalCenter">
                                        <img src="{{asset('frontend/img/mitra/ilmu1.jpeg')}}" alt="">
                                    </a>
                                    <span >Kunci Jualan disosmed</span>
                                </div>
                                <div class="item text-center">
                                    <a href="#" data-toggle="modal" data-target="#exampleModalCenter">
                                        <img src="{{asset('frontend/img/mitra/ilmu2.jpeg')}}" alt="">
                                    </a>
                                    <span >Produk Konowledge</span>
                                </div>
                                <div class="item text-center">
                                    <a href="#" data-toggle="modal" data-target="#exampleModalCenter">
                                        <img src="{{asset('frontend/img/mitra/ilmu3.jpeg')}}" alt="">
                                    </a>
                                    <span >Reseler Sukses SR12</span>
                                </div>
                                <div class="item text-center">
                                    <a href="#" data-toggle="modal" data-target="#exampleModalCenter">
                                        <img src="{{asset('frontend/img/mitra/ilmu4.jpeg')}}" alt="">
                                    </a>
                                    <span >MAP Bisnis SR12</span>
                                </div>
                                <div class="item text-center">
                                    <a href="#" data-toggle="modal" data-target="#exampleModalCenter">
                                        <img src="{{asset('frontend/img/mitra/ilmu5.jpeg')}}" alt="">
                                    </a>
                                    <span >Strategi Marketing</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-title">
                        <h2>Konsep dan Kurikulum Bisnis SR12</h2>
                    </div>
                    <div class="row">
                        <!-- <div class="col-md-12"> -->
                            <!-- <div class="owl-carousel owl-ilmu-strategi"> -->
                                <div class="text-center col-4">
                                    <a href="#" data-toggle="modal" data-target="#exampleModalCenter">
                                        <img src="{{asset('frontend/img/mitra/ilmu6.jpeg')}}" alt="">
                                    </a>
                                    <span >Rumus Menghasilkan Cuan</span>
                                </div>
                                <div class="text-center col-4">
                                    <a href="#" data-toggle="modal" data-target="#exampleModalCenter">
                                        <img src="{{asset('frontend/img/mitra/ilmu7.jpeg')}}" alt="">
                                    </a>
                                    <span >Home Sharing</span>
                                </div>
                                <div class="text-center col-4">
                                    <a href="#" data-toggle="modal" data-target="#exampleModalCenter">
                                        <img src="{{asset('frontend/img/mitra/ilmu8.jpeg')}}" alt="">
                                    </a>
                                    <span >Kurikulum Mitra SR12</span>
                                </div>
                            <!-- </div> -->
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body bg-dark">
                    <div class="text-center text-light">
                        Materi hanya untuk akses Mitra SR12. Silahkan gabung dulu!
                        <a href="{{ route('user.register') }}" class="btn btn-warning">GABUNG</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection