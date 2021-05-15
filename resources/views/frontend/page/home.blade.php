@extends ('frontend/layout.app')
@section ('title', 'Herbal Skincare')

@section ('content')

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg="{{ asset('frontend/img/time-bg.jpg')}}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <span>We're present</span>
                            <h3>SR12 Herbal Skincare By Spotlight Mempersembahkan</h3>
                            <p>SIAPAPUN BISA BISNIS ONLINE DISINI</p>
                            <!-- <a href="#" class="primary-btn">Shop Now</a> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="{{ asset('frontend/img/time-bg.jpg')}}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <span>We're present</span>
                            <h3>SR12 Herbal Skincare By Spotlight Mempersembahkan</h3>
                            <p>SIAPAPUN BISA BISNIS ONLINE DISINI</p>
                            <!-- <a href="#" class="primary-btn">Shop Now</a> -->
                        </div>
                    </div>
                </div>
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
                                <img src="{{ asset('frontend/img/kotak.png')}}" alt="">
                                <div class="inner-text">
                                    <h6>{{ $kategori->category_name }}</h6>
                                </div>
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
                                    <li id="allproduct"><a href="{{('shop.product')}}">Lihat Semua </a></li>
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

    <!-- Women Banner Section Begin -->
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <h4>PRODUK</h4>
                </div>
                <div class="col-6">
                    <div class="filter-control text-right">
                        <ul class="section-tab-nav tab-nav">
                            <li id="allproduct"><a href="{{('shop.product')}}">Lihat Semua </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="product-large set-bg" data-setbg="{{ asset('frontend/img/products/women-large.jpg')}}">
                        <h4>Best Seller</h4>
                        <a href="#">Lihat Semua</a>
                    </div>
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
    <!-- Women Banner Section End -->


    <!-- Women Banner Section Begin -->
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <h4>PRODUK</h4>
                </div>
                <div class="col-6">
                    <div class="filter-control text-right">
                        <ul class="section-tab-nav tab-nav">
                            <li id="allproduct"><a href="{{('shop.product')}}">Lihat Semua </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="product-large set-bg" data-setbg="{{ asset('frontend/img/products/man-large.jpg')}}">
                        <h4>New Product</h4>
                        <a href="#">Lihat Semua</a>
                    </div>
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
    <!-- Women Banner Section End -->

    <!-- Blog Details Section Begin -->
    <!-- <section>
        <div class="container contact-section spad">
            <div class="row">
                <div class="col-1">
                </div>
                <div class="col-10">
                    <div class="blog-more">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="contact-title">
                                    <h4>Testimoni</h4>
                                </div>
                            </div>
                            @foreach($testimony as $no => $testimonies)
                                <div class="col-sm-4">
                                    <a href="{{ route('testimon', $testimonies->testimony_id) }}">
                                        <img src="{{ asset('lte/dist/img/testimony/' . $testimonies->testimony_gambar )}}" alt="">
                                        <h5>{{ Str::limit($testimonies->testimony_judul,50) }}</h5>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Blog Details Section End -->

    <!-- Instagram Section Begin -->
    <div class=" instagram-photo">
        @foreach($testimony as $no => $testimonies)
            <div class="insta-item set-bg" data-setbg="{{ asset('lte/dist/img/testimony/' . $testimonies->testimony_gambar )}}">
                <div class="inside-text">
                    <!-- <i class="ti-instagram"></i> -->
                    <h5 class="text-light">Testimoni</h5>
                    <h5><a href="{{ route('testimon', $testimonies->testimony_id) }}">{{ Str::limit($testimonies->testimony_judul,50) }}</a></h5>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Instagram Section End -->

    <!-- Man Banner Section Begin -->
    <!-- <section class="man-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="filter-control">
                        <ul>
                        <li id="allproduct" class="active">All <a data-toggle="tab" href="#allproduct"></a></li>
                            @foreach($category as $no => $categories2)
                                <li id="li{{ $categories2->category_id }}">
                                    <a data-toggle="tab" href="#{{ $categories2->category_id }}">
                                    {{ $categories2->category_name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">
                        @foreach($productnew as $no => $product2)
                            <div class="product-item">
                                <div class="pi-pic">
                                    <a href="{{ route('detail_product',$product2->product_id)}}">
                                        <img src="{{ asset('lte/dist/img/product/' . $product2->product_image )}}" alt="">
                                    </a>
                                    <ul>
                                        <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                        <li class="quick-view"><a href="#">+ Quick View</a></li>
                                        <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">{{ $product2->category_name }}</div>
                                    <a href="#">
                                        <h5>{{ $product2->category_name }}</h5>
                                    </a>
                                    <div class="product-price">
                                        {{ $product2->product_price }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="product-large set-bg m-large" data-setbg="{{ asset('frontend/img/products/man-large.jpg') }}">
                        <h2>New Poduct</h2>
                        <a href="#">Discover More</a>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Man Banner Section End -->

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