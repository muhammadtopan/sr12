    <!-- Header Section Begin -->
    <header class="header-section fixed-top">
        <div class="nav-item">
            <div class="container" style="background-color: #252525;">
                <div class="inner-header">
                    <div class="row">
                        <div class="col-lg-2 col-md-2">
                            <div class="row">
                                <div class="logo col-6">
                                    <a href="{{('home')}}">
                                        <img src="{{ asset('frontend/img/logo.png') }}" alt="">
                                    </a>
                                </div>
                                <ul class="nav-right col-6">
                                    <li class="cart-icon">
                                        @if( Session::get('tokenUser') == false)
                                            <a href="#">
                                                <i class="icon_bag_alt text-light"></i>
                                                <span>0</span>
                                            </a>
                                            <div class="cart-hover">
                                                <!-- TIDAK ADA PRODUK -->
                                                <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_rqoqnvef.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop autoplay></lottie-player>
                                                <div class="section text-center">
                                                    <h5>Opps.. Masuk dulu keakun belanjaku...</h5>
                                                </div>
                                            </div>
                                        @else
                                        @php
                                            $countCart = DB::table('tb_tmp_details')
                                                        ->where('user_id', Session::get('costumer_id'))
                                                        ->count();
                                            $cart = DB::table('tb_tmp_details')
                                                        ->join('tb_product', 'tb_product.product_id', '=', 'tb_tmp_details.product_id')
                                                        ->select('tb_tmp_details.*','tb_product.product_name', 'tb_product.product_image')
                                                        ->where('user_id', Session::get('costumer_id'))
                                                        ->limit(3)
                                                        ->get();
                                        @endphp
                                            <a href="#">
                                                <i class="icon_bag_alt text-light"></i>
                                                <span id="total_barang">{{ $countCart }}</span>
                                            </a>
                                            <div class="cart-hover">
                                                <div class="select-items">
                                                    <table>
                                                        <tbody>
                                                            @foreach($cart as $i => $carts)
                                                                <tr id="cart{{ $carts->order_details_id }}">
                                                                    <td class="si-pic"><img src="{{ asset('lte/dist/img/product/'. $carts->product_image)}}" alt=""></td>
                                                                    <td class="si-text">
                                                                        <div class="product-selected">
                                                                            <p>Rp {{ $carts->selling_price }}x {{$carts->quantity}}</p>
                                                                            <h6>{{ $carts->product_name }}</h6>
                                                                        </div>
                                                                    </td>
                                                                    <td class="si-closeid">
                                                                        <i class="ti-close" onclick="cartDelete('{{ $carts->order_details_id }}')"></i>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="select-total">
                                                    <span>total:</span>
                                                    <h5 id="total_price">Rp {{ Session::get('total_price') }}</h5>
                                                </div>
                                                <div class="select-button">
                                                    <a href="{{ route('cart') }}" class="primary-btn view-card">LIHAT KERANJANG</a>
                                                    <!-- <a href="{{ route('checkout') }}" class="primary-btn checkout-btn">CHECK OUT</a> -->
                                                </div>
                                            </div>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-10 text-right col-md-10">
                            <nav class="nav-menu mobile-menu mt-3">
                                <ul>
                                    <!-- search -->
                                    <li>
                                        <button type="button" class="search-product" data-toggle="modal" data-target="#searchModal">
                                            <i class="ti-search""></i>
                                        </button>
                                    </li>
                                    <!-- <div class="advanced-search">
                                        <button type="button" class="category-btn">All Categories</button>
                                        <form action="#" class="input-group">
                                            <input type="text" placeholder="What do you need?">
                                            <button type="button"><i class="ti-search"></i></button>
                                        </form>
                                    </div> -->

                                    @php
                                        $articel = DB::table('tb_article')->first();
                                        $testimony = DB::table('tb_testimony')->first();
                                    @endphp
                                    <li class="{{ $active == 'home' ? 'active' : '' }}"><a href="{{ route('home') }}">Beranda</a></li>
                                    <li class="{{ $active == 'about' ? 'active' : '' }}"><a href="{{ route('about') }}">Tentang Kami</a></li>
                                    <li class="{{ $active == 'syarat' ? 'active' : '' }}"><a href="{{ route('syarat_mitra') }}">Mitra</a></li>
                                    <!-- <li class="{{ $active == 'login_mitra' ? 'active' : '' }}"><a href="{{ route('login.mitra') }}">Login</a></li> -->
                                    <li class="{{ $active == 'tool' ? 'active' : '' }}"><a href="{{ route('tool') }}">Tool</a></li>
                                    <li class="{{ $active == 'product' ? 'active' : '' }}"><a href="{{ route('shop.product') }}">Toko</a></li>
                                    @if ($articel != null)
                                        <li class="{{ $active == 'articel' ? 'active' : '' }}"><a href="{{ route('blog',$articel->article_id) }}">Artikel</a></li>
                                    @endif
                                    <li class="{{ $active == 'partnership' ? 'active' : '' }}"><a href="{{ route('partnership') }}">FAQ</a></li>
                                    @if ($testimony != null)
                                    <!-- <li class="{{ $active == 'testimony' ? 'active' : '' }}"><a href="{{ route('testimon', $testimony->testimony_id) }}">Testimoni</a></li> -->
                                    @endif
                                    <!-- <li class="{{ $active == 'login' ? 'active' : '' }}"><a href="{{ route('vendor') }}">Vendor</a></li> -->
                                    <!-- <li class="{{ $active == 'contact' ? 'active' : '' }}"><a href="{{ route('contact') }}">Bantuan</a></li> -->
                                    @if( Session::get('tokenUser') == false)
                                        <li class="{{ $active == 'regis' ? 'active' : '' }} daftar_aktif"><a href="{{ route('user.register') }}">Daftar</a></li>
                                        <li class="{{ $active == 'masuk' ? 'active' : '' }} daftar_aktif"><a href="{{ route('user.login') }}">Akun Belanjaku</a></li>
                                    @else
                                    <li class="daftar_aktif"><a href="#">{{Session::get('costumer_name')}}</a>
                                        <ul class="dropdown">
                                            <li><a href="{{ route('user.profile') }}">Profile</a></li>
                                            <li><a href="#">Point: 30</a></li>
                                            <li><a href="{{ route('user.logout') }}">Keluar</a></li>
                                        </ul>
                                    </li>
                                    @endif
                                </ul>
                            </nav>
                            <div id="mobile-menu-wrap">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container text-right">

            </div>
    </header>
    <!-- Header End -->
        <br> <br style="margin-bottom: 10px">

    <!-- Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body inner-header bg-modal-search">
                    <div class="advanced-search">
                        <form action="{{ route('search-product')}}" class="input-group" method="GET">
                            <input type="text" name="search" placeholder="Nama Produk" value="{{ old('search') }}">
                            <button type="submit"><i class="ti-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        async function cartDelete(id) {
            let cart = document.getElementById(`cart${id}`);
            cart.remove();
            let res = await axios.delete('{{route("cart.delete")}}',
            {params: {
                    'id': id
                }
            })
            console.log(res);
            $('#total_price').text(res.data.total);
            $('#total_barang').text(res.data.barang);
        }
    </script>
