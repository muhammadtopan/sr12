@extends ('frontend/layout.app')
@section ('title', 'Herbal Skincare')

@section ('content')
    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 d-none d-lg-block">
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
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <span>{{ $product->category_name }}</span>
                                    <h3>{{ $product->product_name }}</h3>
                                </div>
                                <ul class="pd-tags">
                                    <li><span>No. BPOM</span>: {{ $product->product_bpom }}</li>
                                    <li><span>Netto</span>: {{ $product->product_netto }} {{ $product->product_unit_netto }}</li>
                                    <li><span>Berat</span>: {{ $product->product_weight }} {{ $product->product_unit }}</li>
                                </ul>
                                <div class="pd-desc">
                                    <h4>Rp {{ number_format($product->product_price,0,",",".") }} </h4>
                                    <h4 id="productPrice" class="d-none">{{ number_format($product->product_price) }} </h4>
                                </div>
                                <div class="quantity">
                                    <form action="{{route("add_to_cart",$product->product_id)}}" method="post">
                                        @csrf
                                        <div class="pro-qty">
                                            <input name="qty" id="quantity" type="number" value="{{$qty !== null ? $qty->quantity : 1}}">
                                        </div>
                                        <button class="primary-btn pd-cart" type="submit">Add To Cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-tab">
                        <div class="tab-item">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#tab-1" role="tab">DESKRIPSI</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <p> {!! $product->product_desk !!} </p>
                                            </div>
                                            <div class="col-lg-5">
                                                <img style="border: 2px solid #e7ab3c" src="{{ asset('lte/dist/img/product/'.$product->product_image)}}" alt="">
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
                    <div class="col-lg-2 col-sm-3 col-4">
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="{{ asset('lte/dist/img/product/' . $product2->product_image )}}" alt="">
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
