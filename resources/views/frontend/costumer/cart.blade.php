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
                        <span>Keranjang</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->
    <!-- <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel owl-status-orderan">
                        <div class="item"><button class="btn btn-light border border-secondary rounded">Keranjang</button></div>
                        <div class="item"><button class="btn btn-light border border-secondary rounded">Menunggu</button></div>
                        <div class="item"><button class="btn btn-light border border-secondary rounded">Dipacking</button></div>
                        <div class="item"><button class="btn btn-light border border-secondary rounded">Dikirim</button></div>
                        <div class="item"><button class="btn btn-light border border-secondary rounded">Diterima</button></div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <form action="{{route("checkout")}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Checkout</th>
                                        <th>Gambar</th>
                                        <th class="p-name">Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                        <th><i class="ti-close"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cart as $no => $carts)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="checkout[]" value="{{$carts->order_details_id}}" />
                                            </td>
                                            <td class="cart-pic first-row"><img src="{{ asset('lte/dist/img/product/'. $carts->product_image)}}" alt=""></td>
                                            <td class="cart-title first-row">
                                                <h5>{{ $carts->product_name }}</h5>
                                            </td>
                                            <input type="hidden" name="order_details_id[]" value="{{$carts->order_details_id}}">
                                            <input type="hidden" name="product_id[]" value="{{$carts->product_id}}">
                                            <input type="hidden" name="price[]" value="{{$carts->selling_price}}">
                                            <td class="p-price first-row">Rp {{ number_format($carts->selling_price) }}</td>
                                            <td class="qua-col first-row">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input type="text" name="qty[]" value="{{ $carts->quantity }}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="total-price first-row">Rp {{ number_format($carts->total_price) }}</td>
                                            <td class="close-td first-row"><i class="ti-close"></i></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="cart-buttons">
                                    <a href="{{ route('shop.product') }}" class="primary-btn continue-shop">Lanjutkan Belanja</a>
                                </div>
                            </div>
                            <div class="col-lg-4 offset-lg-4">
                                @if(Session::has('pesan'))
                                    <p class="alert alert-info">{{ Session::get('pesan') }}</p>
                                @endif
                                <div class="proceed-checkout">
                                    <ul>
                                        <!-- <li class="subtotal">Subtotal <span>$240.00</span></li> -->
                                        <li class="cart-total">Total <span>Rp {{ number_format(Session::get('total_price')) }}</span></li>
                                    </ul>
                                    <button type="submit" class="proceed-btn">LIHAT TAGIHAN</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

@endsection
