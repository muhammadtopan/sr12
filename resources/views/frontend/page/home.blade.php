@extends ('frontend/layout.app')
@section ('title', 'Herbal Skincare')

@section ('content')

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg="{{ asset('frontend/img/time-bg.jpg')}}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Bag,kids</span>
                            <h1>Black friday</h1>
                            <p>SIAPAPUN BISA MEMILIKI TOKO ONLINE PRIBADI MPSTORE</p>
                            <a href="#" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div>
            <!-- <div class="single-hero-items set-bg" data-setbg="{{ asset('frontend/img/time-bg.jpg')}}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Bag,kids</span>
                            <h1>Black friday</h1>
                            <p>SIAPAPUN BISA MEMILIKI TOKO ONLINE PRIBADI MPSTORE</p>
                            <a href="#" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div> -->
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="single-banner">
                        <img src="{{ asset('frontend/img/banner-1.jpg')}}" alt="">
                        <div class="inner-text">
                            <h4>Men’s</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-banner">
                        <img src="{{ asset('frontend/img/banner-2.jpg')}}" alt="">
                        <div class="inner-text">
                            <h4>Women’s</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-banner">
                        <img src="{{ asset('frontend/img/banner-3.jpg')}}" alt="">
                        <div class="inner-text">
                            <h4>Kid’s</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-banner">
                        <img src="{{ asset('frontend/img/banner-3.jpg')}}" alt="">
                        <div class="inner-text">
                            <h4>Kid’s</h4>
                        </div>
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
                            <h4>Produk</h4>
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
                <div class="col-lg-2">
                    <div class="product-large set-bg" data-setbg="{{ asset('frontend/img/products/women-large.jpg')}}">
                        <h4>Best Seller</h4>
                        <a href="#">Discover More</a>
                    </div>
                </div>
                <div class="col-lg-9 offset-lg-1">
                    <div class="filter-control text-right">
                        <ul class="section-tab-nav tab-nav">
                            <li id="allproduct" >Lihat Semua <a data-toggle="tab" href="#allproduct"></a></li>
                        </ul>
                    </div>
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
                <div class="col-lg-2">
                    <div class="product-large set-bg" data-setbg="{{ asset('frontend/img/products/man-large.jpg')}}">
                        <h2>New Product</h2>
                        <a href="#">Discover More</a>
                    </div>
                </div>
                <div class="col-lg-9 offset-lg-1">
                    <div class="filter-control text-right">
                        <ul class="section-tab-nav tab-nav">
                            <li id="allproduct" >Lihat emua <a data-toggle="tab" href="#allproduct"></a></li>
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

    <!-- Latest Blog Section Begin -->
    <section class="latest-blog spad">
        <div class="container">
            <div class="benefit-items">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="{{ asset('frontend/img/icon-1.png') }}" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Free Shipping</h6>
                                <p>For all order over 99$</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="{{ asset('frontend/img/icon-2.png') }}" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Delivery On Time</h6>
                                <p>If good have prolems</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="{{ asset('frontend/img/icon-1.png') }}" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Secure Payment</h6>
                                <p>100% secure payment</p>
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