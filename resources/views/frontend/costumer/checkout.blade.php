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
<form action="{{route("checkout.fix")}}" method="post" class="checkout-form" enctype="multipart/form-data">
    @csrf
    <section class="checkout-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h4>Rincian Penagihan</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="order_address">Alamat Legkap</label>
                            <input name="alamat_lengkap" type="text" id="order_address">
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="prov_id">Provinsi</label>
                                <select name="provinsi" id="prov_id" class="form-control">
                                    @foreach ($provinsi as $prov)
                                        <option
                                        {{$prov->prov_id === $user->prov_id ? "selected" : ""}}
                                        value="{{$prov->prov_id}}">{{$prov->prov_nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="kota_id">Kota</label>
                                <select onchange="vendorDalamKota(this,{{json_encode($qty)}},{{json_encode($product_id)}})" name="kota" id="kota_id" class="form-control">
                                        @foreach ($kota as $k)
                                            <option
                                            {{$k->kota_id === $user->kota_id ? "selected" : ""}}
                                            value="{{$k->kota_id}}">{{$k->kota_nama}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <label for="vendor_id">Vendor</label>
                            <div class="form-group">
                                <select name="vendor" onchange="cekOngkir(this)" id="vendor" class="form-control">
                                    @foreach ($vendor as $v)
                                        <option value="{{$v->user_id}}">{{$v->nama_lengkap}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div id="jenis_kirim_container" class="col-lg-12">
                            <label for="jenis_kirim">Jenis Pengiriman</label>
                            <div class="form-group">
                                <select  name="jenis_kirim" onchange="changeTotal(this)" id="jenis_kirim" class="form-control">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="bank">Pilih Bank</label>
                                <select name="bank" id="" class="form-control">
                                    <option selected value="{{null}}"disabled>Pilih Bank</option>
                                    @foreach ($bank as $b)
                                        <option value="{{$b->bank_name}}">{{$b->bank_name}}</option>
                                    @endforeach
                                    {{-- <option value="BRI">BRI</option>
                                    <option value="BNI">BNI</option>
                                    <option value="MANDIRI">MANDIRI</option>
                                    <option value="BCA">BCA</option> --}}
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="place-order">
                        <h4>Pesananmu</h4>
                        <input type="hidden" name="total" value="{{$total_price}}">
                        @foreach ($qty as $key => $q)
                            <input type="hidden" name="qty[]" value="{{$q}}">
                            <input type="hidden" name="product_id[]" value="{{$product_id[$key]}}" id="product_id">
                            <input type="hidden" name="user_id" id="user_id" value="{{Session::get("costumer_id")}}">
                        @endforeach
                        <div class="order-total">
                            <ul class="order-table">
                                <li>Produk <span>Total</span></li>
                                @foreach($cart as $i => $carts)
                                    <li class="fw-normal">{{ $carts->product_name }} x {{ $carts->quantity }} <span>Rp {{ number_format($carts->total_price) }}</span></li>
                                @endforeach
                                <li class="total-price">Total <span>Rp <span id="total">{{ number_format($total_price) }}</span> </span></li>
                            </ul>
                            <div class="order-btn">
                                <button type="button" class="site-btn place-btn" data-toggle="modal" data-target="#modalTransfer">Bayar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="modalTransfer" tabindex="-1" role="dialog" aria-labelledby="modalTransferTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTransferTitle">Masukan Bukti Transfer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Bukti Transfer</label>
                        <input name="bukti_transfer" type="file" class="form-control" id="foto_transfer">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Keterangan</label>
                        <input name="keterangan" type="Keterangan" class="form-control" id="keterangan" placeholder="(kalau ada)">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="site-btn place-btn" data-dismiss="modal">Close</button>
                <button type="submit" class="site-btn bg-dark border-dark">Kirim</button>
            </div>
            </div>
        </div>
    </div>
</form>
    @include('frontend.costumer.checkout_script')
@endsection
