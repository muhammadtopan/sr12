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
                    <a href="{{ route('shop.product') }}">Product</a>
                        <span>Detail Product</span>
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
                <div class="col-lg-3 d-none d-lg-block">
                    <!-- <div class="filter-widget">
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
                    </div> -->
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img class="" src="{{ asset('lte/dist/img/product/'.$product->product_image)}}" alt="">
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                            <!-- <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    <div class="pt active" data-imgbigurl="{{ asset('lte/dist/img/product/'.$product->product_image)}}"><img
                                            src="{{ asset('lte/dist/img/product/'.$product->product_image)}}" alt=""></div>
                                </div>
                            </div> -->
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <span>{{ $product->category_name }}</span>
                                    <h3>{{ $product->product_name }}</h3>
                                </div>
                                <ul class="pd-tags">
                                    <li><span>No. BPOM</span>: {{ $product->product_bpom }}</li>
                                    <li><span>Netto</span>: {{ $product->product_netto }} {{ $product->product_unit }}</li>
                                    <li><span>Berat</span>: {{ $product->product_weight }} {{ $product->product_unit }}</li>
                                </ul>
                                <div class="pd-desc">
                                    <h4>Rp {{ number_format($product->product_price) }} </h4>
                                    <h4 id="productPrice" class="d-none">{{ number_format($product->product_price) }} </h4>
                                </div>
                                <div class="quantity">
                                    <form action="{{route("add_to_cart",$product->product_id)}}" method="post">
                                        @csrf
                                        <div class="pro-qty">
                                            <input name="qty" id="quantity" type="number" value="{{$qty !== null ? $qty->quantity : 1}}">
                                        </div>
                                        <button class="primary-btn pd-cart" type="submit">Add To Cart</button>
                                        {{-- <a href="{{ route('add_to_cart',$product->product_id)}}" class="primary-btn pd-cart">Add To Cart</a> --}}
                                    </form>
                                </div>
                                <!-- <div class="pd-share">
                                    <div class="p-code">Sku : 00012</div>
                                    <div class="pd-social">
                                        <a href="#"><i class="ti-facebook"></i></a>
                                        <a href="#"><i class="ti-twitter-alt"></i></a>
                                        <a href="#"><i class="ti-linkedin"></i></a>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="product-tab">
                        <div class="tab-item">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#tab-1" role="tab">DESCRIPTION</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-2" role="tab">SPECIFICATIONS</a>
                                </li>
                                <!-- <li>
                                    <a data-toggle="tab" href="#tab-3" role="tab">Customer Reviews (02)</a>
                                </li> -->
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <h5>Introduction</h5>
                                                <p> {!! $product->product_desk !!} </p>
                                            </div>
                                            <div class="col-lg-5">
                                                <img src="{{ asset('lte/dist/img/product/'.$product->product_image)}}" alt="">
                                            </div>
                                        </div>Rp {{ number_format($product->product_price) }}
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <div class="specification-table">
                                        <table>
                                            <tr>
                                                <td class="p-catagory">Harga</td>
                                                <td>
                                                    <div class="p-price">Rp {{ number_format($product->product_price) }}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Stok Barang</td>
                                                <td>
                                                    <div class="p-stock">ini stok toko</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Netto</td>
                                                <td>
                                                    <div class="p-weight">{{ $product->product_netto }} {{ $product->product_unit }}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Berat</td>
                                                <td>
                                                    <div class="p-weight">{{ $product->product_weight }} {{ $product->product_unit }}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">BPOM</td>
                                                <td>
                                                    <div class="p-code">{{ $product->product_bpom }}</div>
                                                </td>
                                            </tr>
                                        </table>
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

    <!-- Related Products Section End -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Produk Terkait</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($relate as $no => $product2)
                    <div class="col-lg-3 col-sm-6">
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="{{ asset('lte/dist/img/product/' . $product2->product_image )}}" alt="">
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="#">+ Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
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
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Related Products Section End -->

    <script>

        var quan = document.getElementById('quantity').value;
        var hQuan = document.getElementById('hiddenQuantity');

        var asd = hQuan.textContent = quan;

        // console.log(quan);
        quan.addEventListener('change', function(){
            var priceAsli = document.getElementById('productPrice').textContent;
            var total = priceAsli * quan;
            console.log('total');
        })
    </script>

@endsection
