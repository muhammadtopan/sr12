@extends ('frontend/layout.app')
@section ('title', 'Herbal Skincare')

@section ('content')
    <!-- Hero Section Begin -->
    <section class="hero-section">
        <!-- <div class="row"> -->
            <!-- <div class="col-md-12"> -->
                <div class="hero-items owl-carousel">
                    <div class="single-hero-items set-bg" data-setbg="{{ asset('frontend/img/slider/all_product.jpg')}}">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7">
                                    <span>We're present</span>
                                    <h5 class="text-light">SR12 Herbal Skincare By. Spotlight Team Mempersembahkan Marketplace Pertama Semua Produk SR12 Herbal Skincare di Seluruh Daerah Di Indonesia</h5>
                                    <span>SIAPAPUN BISA BISNIS ONLINE DISINI DENGAN BENEFIT YANG LUAR BIASA</span>
                                    <a href="{{ route('user.register') }}" class="btn btn-warning text-light">Gabung</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-hero-items set-bg" data-setbg="{{ asset('frontend/img/slider/new_product.jpg')}}">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7">
                                    <span>We're present</span>
                                    <h5 class="text-light">SR12 Herbal Skincare By. Spotlight Team Mempersembahkan Marketplace Pertama Semua Produk SR12 Herbal Skincare di Seluruh Daerah Di Indonesia</h5>
                                    <span>SIAPAPUN BISA BISNIS ONLINE DISINI DENGAN BENEFIT YANG LUAR BIASA</span>
                                    <a href="{{ route('user.register') }}" class="btn btn-warning text-light">Gabung</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-hero-items set-bg" data-setbg="{{ asset('frontend/img/slider/product_herbal.jpg')}}">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7">
                                    <span>We're present</span>
                                    <h5 class="text-light">SR12 Herbal Skincare By. Spotlight Team Mempersembahkan Marketplace Pertama Semua Produk SR12 Herbal Skincare di Seluruh Daerah Di Indonesia</h5>
                                    <span>SIAPAPUN BISA BISNIS ONLINE DISINI DENGAN BENEFIT YANG LUAR BIASA</span>
                                    <a href="{{ route('user.register') }}" class="btn btn-warning text-light">Gabung</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-hero-items set-bg" data-setbg="{{ asset('frontend/img/slider/product_terlaris.jpg')}}">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7">
                                    <span>We're present</span>
                                    <h5 class="text-light">SR12 Herbal Skincare By. Spotlight Team Mempersembahkan Marketplace Pertama Semua Produk SR12 Herbal Skincare di Seluruh Daerah Di Indonesia</h5>
                                    <span>SIAPAPUN BISA BISNIS ONLINE DISINI DENGAN BENEFIT YANG LUAR BIASA</span>
                                    <a href="{{ route('user.register') }}" class="btn btn-warning text-light">Gabung</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- </div> -->
            <!-- <div class="col-md-4 pl-0">
                <img class="foto-bersama" src="{{ asset('frontend/img/slider/foto.jpg')}}" alt="">
            </div> -->
        <!-- </div> -->
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 mb-5">
                    <h4><b> KATEGORI PRODUK </b></h4>
                </div>
                <div class="col-lg-12">
                    <div class="kategori owl-carousel">
                        @foreach($category as $no => $kategori)
                            <a href="{{ route('category-product', $kategori->category_id) }}">
                                <div class="single-banner">
                                    <img src="{{ asset('lte/dist/img/category/'. $kategori->category_image)}}" alt="">
                                    <div class="text-center">
                                        <h6  class="font-weight-bold">{{ $kategori->category_name }}</h6>
                                    </div>
                                </div>
                            </a>
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
                                        <!-- <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li> -->
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
                                        Rp {{ number_format($product10->product_price,0,",",".") }}
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
                            <a href="{{ url('filter/packages/'. $pakets->category_opp_id) }}">
                                <div class="single-banner">
                                    <img src="{{ asset('lte/dist/img/category_opp/'. $pakets->category_opp_image)}}" alt="">
                                    <div class="text-center">
                                        <h6  class="font-weight-bold">{{ $pakets->category_opp_name }}</h6>
                                    </div>
                                </div>
                            </a>
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
                @if ($productterbest != null)
                    <a href="{{ route('detail_product',$productterbest->product_id) }}">
                        <div class="col-lg-2">
                            <div class="product-large set-bg" data-setbg="{{ asset('lte/dist/img/product/' . $productterbest->product_image )}}">
                        </div>
                    </a>
                @endif
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
                                        <!-- <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li> -->
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
                                        Rp {{ number_format($product1->product_price,0,",",".") }}
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
                @if ($productternew != null)
                    <a href="{{ route('detail_product',$productternew->product_id) }}">
                        <div class="col-lg-2">
                            <div class="product-large set-bg" data-setbg="{{ asset('lte/dist/img/product/' . $productternew->product_image )}}">
                        </div>
                    </a>
                @endif
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
                                        <!-- <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li> -->
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
                                        Rp {{ number_format($product2->product_price,0,",",".") }}
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

    <!-- Testimoni Begin -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <h4 id="testi">TESTIMONI</h4>
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
            <div id="testi{{ $testimonies->testimony_id }}"
                onclick="bigTesti('{{ asset('lte/dist/img/testimony/' . $testimonies->testimony_gambar )}}')" class="insta-item set-bg" data-setbg="{{ asset('lte/dist/img/testimony/' . $testimonies->testimony_gambar) }}"></div>
        @endforeach
    </div>
    <!-- Testimoni End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-details-inner">
                        <div class="blog-post">
                            <div class="row">
                                <div class="owl-carousel owl-ulasan">
                                    @foreach($ulasan as $no => $ulas)
                                        <div class="item col-lg-6 col-md-6">
                                            <div class="prev-blog">
                                                <div class="pb-text">
                                                    <span>{{ $ulas->email }}</span>
                                                    <h4>{{ $ulas->ulasan }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

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
                                <p>untuk kamu yang hobi jualan <a href="{{ route('belanjaHemat') }}" class="btn btn-sm bg-warning text-light">klik disini</a> </p>
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
                                <p>untuk kamu didaerahmu <a href="{{ route('peluangBisnis') }}" class="btn btn-sm bg-warning text-light">klik disini</a> </p>
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
                                <p>segera tukarkan pointnya <a href="{{ route('user.register') }}" class="btn btn-sm bg-warning text-light">klik disini</a> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->

    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button> -->

    <div class="modal fade bd-example-modal-lg" id="modalTestimony" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body" style="background-color: #252525">
                    <!-- <div id="img"></div> -->
                    <div class="slide-testi owl-carousel">
                        @foreach($testimony as $no => $modaltesti)
                            <div class="testi-img">
                                <img src="{{ asset('lte/dist/img/testimony/' . $modaltesti->testimony_gambar) }}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        // let asd = document.getElementById("testi")
        function bigTesti(x) {
            $('#modalTestimony').modal()
            // $('#img').append(`<img src="${x}">`);
        }
    </script>
@endsection
