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
                        <h4 class="fw-title">Paket Product</h4>
                            <ul class="filter-catagories">
                                @foreach($package as $no => $packagelist)
                                    <li><a href="#">{{ $packagelist->package_category_name }}</a></li>
                                @endforeach
                            </ul>
                    </div>
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
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <div class="select-option">
                                    <select class="sorting">
                                        <option value="">Default Sorting</option>
                                    </select>
                                    <select class="p-show">
                                        <option value="">Show:</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 text-right">
                                <p>Show 01- 09 Of 36 Product</p>
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