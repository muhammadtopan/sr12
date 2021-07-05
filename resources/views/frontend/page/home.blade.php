@extends ('frontend/layout.app')
@section ('title', 'Herbal Skincare')

@section ('content')

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="row">
            <div class="col-md-9 pr-0">
                <div class="hero-items owl-carousel">
                    <div class="single-hero-items set-bg" data-setbg="{{ asset('frontend/img/time-bg.jpg')}}">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7">
                                    <span>We're present.....</span>
                                    <h5>SR12 Herbal Skincare By. Spotlight Team Mempersembahkan Marketplace Pertama Semua Produk SR12 Herbal Skincare di Seluruh Daerah Di Indonesia.....</h5>
                                    <span>SIAPAPUN BISA BISNIS ONLINE DISINI DENGAN BENEFIT YANG LUAR BIASA</span>
                                    <a href="{{ route('user.register') }}" class="primary-btn">Gabung</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-hero-items set-bg" data-setbg="{{ asset('frontend/img/time-bg.jpg')}}">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7">
                                    <span>We're present.....</span>
                                    <h5>SR12 Herbal Skincare By. Spotlight Team Mempersembahkan Marketplace Pertama Semua Produk SR12 Herbal Skincare di Seluruh Daerah Di Indonesia.....</h5>
                                    <span>SIAPAPUN BISA BISNIS ONLINE DISINI DENGAN BENEFIT YANG LUAR BIASA</span>
                                    <a href="{{ route('user.register') }}" class="primary-btn">Gabung</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 pl-0">
                <img class="foto-bersama" src="{{ asset('frontend/img/banner-1.jpg')}}" alt="">
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="kategori owl-carousel">
                        @foreach($category as $no => $kategori)
                            <div class="single-banner">
                                <img src="{{ asset('lte/dist/img/category/'. $kategori->category_image)}}" alt="">
                                <!-- <div class="inner-text">
                                    <h6>{{ $kategori->category_name }}</h6>
                                </div> -->
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Section End -->

    <!-- Semua Produk -->
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-6">
                            <h4>PRODUK</h4>
                        </div>
                        <div class="col-6">
                            <div class="filter-control text-right">
                                <ul class="section-tab-nav tab-nav">
                                    <li id="allproduct"><a href="{{('shop/product')}}">Lihat Semua </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="allproduct-slider owl-carousel">
                        @foreach($allproduct as $no => $product10)
                        <!-- <div class="col-lg-3 col-sm-6"> -->
                            <div class="product-item">
                                <div class="pi-pic">
                                    <a href="{{ route('detail_product',$product10->product_id)}}">
                                        <img src="{{ asset('lte/dist/img/product/' . $product10->product_image )}}" alt="">
                                    </a>
                                    <ul>
                                        <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                        <!-- <li class="quick-view"><a href="{{ route('detail_product',$product10->product_id)}}">+ Quick View</a></li> -->
                                        <!-- <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li> -->
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">{{ $product10->category_name }}</div>
                                    <a href="#">
                                        <h5>{{ $product10->product_name }}</h5>
                                    </a>
                                    <div class="product-price">
                                        Rp {{ number_format($product10->product_price) }}
                                    </div>
                                </div>
                            </div>
                        <!-- </div> -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Semua Produk -->

    <!-- Paket Product -->
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-6">
                            <h4>PAKET PRODUK</h4>
                        </div>
                        <div class="col-6">
                            <div class="filter-control text-right">
                                <ul class="section-tab-nav tab-nav">
                                    <li id="allproduct"><a href="{{('shop.product')}}">Lihat Semua</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="package-slider owl-carousel">
                        @foreach($paket as $no => $pakets)
                        <!-- <div class="col-lg-3 col-sm-6"> -->
                            <div class="product-item">
                                <div class="pi-pic">
                                    <a href="#">
                                        <img src="{{ asset('lte/dist/img/package_category/' . $pakets->package_category_image )}}" alt="">
                                    </a>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">{{ $pakets->package_category_name }}</div>
                                    <div class="product-price">
                                        Rp {{ number_format($pakets->package_category_price) }}
                                    </div>
                                </div>
                            </div>
                        <!-- </div> -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Paket Product -->

    <!-- Best Seller Begin -->
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <h4>BEST PRODUK</h4>
                </div>
                <div class="col-6">
                    <div class="filter-control text-right">
                        <ul class="section-tab-nav tab-nav">
                            <li id="allproduct"><a href="{{route('shop.product.filter', "best-seller")}}">Lihat Semua </a></li>
                        </ul>
                    </div>
                </div>
                <a href="{{ route('detail_product',$productterbest->product_id) }}">
                    <div class="col-lg-2">
                        <div class="product-large set-bg" data-setbg="{{ asset('lte/dist/img/product/' . $productterbest->product_image )}}">
                    </div>
                </a>
                </div>
                <div class="col-lg-9 offset-lg-1">
                    <div class="product-slider owl-carousel">
                        @foreach($product as $no => $product1)
                            <div class="product-item">
                                <div class="pi-pic">
                                    <a href="{{ route('detail_product',$product1->product_id)}}">
                                        <img src="{{ asset('lte/dist/img/product/' . $product1->product_image )}}" alt="">
                                    </a>
                                    <ul>
                                        <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                        <!-- <li class="quick-view"><a href="{{ route('detail_product',$product1->product_id)}}">+ Quick View</a></li> -->
                                        <!-- <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li> -->
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">{{ $product1->category_name }}</div>
                                    <a href="#">
                                        <h5>{{ $product1->product_name }}</h5>
                                    </a>
                                    <div class="product-price">
                                        Rp {{ number_format($product1->product_price) }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Best Seller End -->


    <!-- New Product Begin -->
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <h4>PRODUK BARU</h4>
                </div>
                <div class="col-6">
                    <div class="filter-control text-right">
                        <ul class="section-tab-nav tab-nav">
                            <li id="allproduct"><a href="{{route('shop.product.filter', "product-terbaru")}}">Lihat Semua </a></li>
                        </ul>
                    </div>
                </div>
                <a href="{{ route('detail_product',$productterbest->product_id) }}">
                    <div class="col-lg-2">
                        <div class="product-large set-bg" data-setbg="{{ asset('lte/dist/img/product/' . $productternew->product_image )}}">
                    </div>
                </a>
                </div>
                <div class="col-lg-9 offset-lg-1">
                    <div class="product-slider owl-carousel">
                        @foreach($productnew as $no => $product2)
                            <div class="product-item">
                                <div class="pi-pic">
                                    <a href="{{ route('detail_product',$product2->product_id)}}">
                                        <img src="{{ asset('lte/dist/img/product/' . $product2->product_image )}}" alt="">
                                    </a>
                                    <ul>
                                        <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                        <!-- <li class="quick-view"><a href="{{ route('detail_product',$product2->product_id)}}">+ Quick View</a></li> -->
                                        <!-- <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li> -->
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">{{ $product2->category_name }}</div>
                                    <a href="#">
                                        <h5>{{ $product2->product_name }}</h5>
                                    </a>
                                    <div class="product-price">
                                        Rp {{ number_format($product2->product_price) }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- New Product End -->

    <!-- Instagram Section Begin -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <h4>TESTIMONI</h4>
            </div>
            <div class="col-6">
                <div class="filter-control text-right">
                    <ul class="section-tab-nav tab-nav">
                        <li><a href="https://t.me/joinchat/UeeoAU59XSQ8wTJt" target="_blank">Lihat Semua </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="instagram-photo testi-slider owl-carousel">
        @foreach($testimony as $no => $testimonies)
            <div class="insta-item set-bg" data-setbg="{{ asset('lte/dist/img/testimony/' . $testimonies->testimony_gambar )}}"></div>
        @endforeach
    </div>
    <!-- Instagram Section End -->

    <!-- Latest Blog Section Begin -->
    <section class="latest-blog spad">
        <div class="container">
            <div class="benefit-items">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <!-- <img src="{{asset('frontend/img/icon-1.png')}}" alt=""> -->
                                <lottie-player src="https://assets9.lottiefiles.com/private_files/lf30_k985zjll.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"  loop autoplay></lottie-player>
                            </div>
                            <div class="sb-text">
                                <h6>BELANJA HEMAT</h6>
                                <p>untuk kamu yang hobi jualan <a href="#" class="btn btn-sm btn-warning text-light">klik disini</a> </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <!-- <img src="{{asset('frontend/img/icon-2.png')}}" alt=""> -->
                                <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_BzsCRH.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"  loop  autoplay></lottie-player>
                            </div>
                            <div class="sb-text">
                                <h6>PELUANG BISNIS</h6>
                                <p>untuk kamu didaerahmu <a href="#" class="btn btn-sm btn-warning text-light">klik disini</a> </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <!-- <img src="{{asset('frontend/img/icon-1.png')}}" alt=""> -->
                                <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_S1HvNl.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"  loop  autoplay></lottie-player>
                            </div>
                            <div class="sb-text">
                                <h6>HADIAH MENARIK</h6>
                                <p>segera tukarkan pointnya <a href="{{ route('user.register') }}" class="btn btn-sm btn-warning text-light">klik disini</a> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->

    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button> -->

    <div class="modal fade bd-example-modal-lg" id="quickView" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
            </div>
        </div>
    </div>
@endsection
