@extends ('frontend/layout.app')
@section ('title', 'Herbal Skincare')

@section ('content')

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Product</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                    <div class="filter-widget">
                        <h4 class="fw-title">Kategori Produk</h4>
                        <div class="fw-brand-check">
                            @foreach($category as $no => $ctglist)
                                <div class="bc-item">
                                    <label for="ctglist{{ $ctglist->category_id }}">
                                        {{ $ctglist->category_name }}
                                        <input type="checkbox" id="ctglist{{ $ctglist->category_id }}">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Paket Product</h4>
                        <ul class="filter-catagories">
                            @foreach($package as $no => $packagelist)
                                <li><a href="#">{{ $packagelist->package_category_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Harga</h4>
                        <div class="filter-range-wrap">
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="10000" data-max="999999">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                        </div>
                        <a href="#" class="filter-btn">Filter</a>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <div class="select-option">
                                    <select class="sorting">
                                        <option value="">Acak</option>
                                        <option value="">Harga Terendah</option>
                                        <option value="">Harga Tertinggi</option>
                                        <option value="">Product Terbaru</option>
                                        <option value="">Best Seller</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-list">
                        <div class="row">
                            @foreach($product as $no => $pdklist)
                                <div class="col-lg-3 col-sm-4">
                                    <div class="product-item">
                                        <div class="pi-pic">
                                            <a href="{{ route('detail_product',$pdklist->product_id)}}">
                                                <img src="{{ asset('lte/dist/img/product/' . $pdklist->product_image )}}" alt="">
                                            </a>
                                            <ul>
                                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                                <!-- <li class="quick-view"><a href="#">+ Quick View</a></li>
                                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li> -->
                                            </ul>
                                        </div>
                                        <div class="pi-text">
                                            <div class="catagory-name">{{ $pdklist->category_name }}</div>
                                            <a href="#">
                                                <h5>{{ $pdklist->product_name }}</h5>
                                            </a>
                                            <div class="product-price">
                                                Rp {{ number_format($pdklist->product_price) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

@endsection