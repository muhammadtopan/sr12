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
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad">
        <div class="container">
            <form action="#" class="checkout-form">
                <div class="row">
                    <div class="col-lg-6">
                        <h4>Rincian Penagihan</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="order_address">Alamat Legkap</label>
                                <input type="text" id="order_address">
                            </div>
                            <div class="col-lg-12">
                                <label for="prov_id">Provinsi</label>
                                <input type="text" id="prov_id">
                            </div>
                            <div class="col-lg-12">
                                <label for="kota_id">Kota</label>
                                <input type="text" id="kota_id">
                            </div>
                            <div class="col-lg-12">
                                <label for="vendor_id">Vendor</label>
                                <input type="text" id="vendor_id">
                            </div>
                            <div class="col-lg-12">
                                <label for="ongkir">Ongkir</label>
                                <input type="text" id="ongkir">
                            </div>
                            <div class="col-lg-12">
                                <label for="bank">Pilih Bank</label>
                                <input type="text" id="bank">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="place-order">
                            <h4>Pesananmu</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Produk <span>Total</span></li>
                                    @foreach($cart as $i => $carts)
                                        <li class="fw-normal">{{ $carts->product_name }} x {{ $carts->quantity }} <span>Rp {{ number_format($carts->total_price) }}</span></li>
                                    @endforeach
                                    <li class="total-price">Total <span>Rp {{ number_format($total_price) }}</span></li>
                                </ul>
                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn">Bayar</button>
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