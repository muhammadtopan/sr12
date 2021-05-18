    <!-- Header Section Begin -->
    <header class="header-section fixed-top">
        <!-- <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        hello.colorlib@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        +65 11.188.888
                    </div>
                </div>
                <div class="ht-right">
                    <a href="#" class="login-panel"><i class="fa fa-user"></i>Login</a>
                        <a href="{{ route('vendor') }}" class="login-panel"  style="margin-right: 13px"><i class="fa fa-user"></i>Vendor</a>
                    <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div> -->
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
                                                <!-- <lottie-player src="https://assets6.lottiefiles.com/temp/lf20_jzqS18.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player> -->
                                                <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_rqoqnvef.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop autoplay></lottie-player>
                                                <!-- <img src="{{asset('frontend/img/undraw/empty-cart.json')}}" alt="" style="width: 25em;"> -->
                                            <div class="section text-center">
                                                <h5>Opps.. Masuk dulu keakun belanjaku...</h5>
                                            </div>
                                        </div>
                                    @else
                                        <a href="#">
                                            <i class="icon_bag_alt text-light"></i>
                                            <span>0</span>
                                        </a>
                                        <div class="cart-hover">
                                            <div class="select-items">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td class="si-pic"><img src="{{ asset('frontend/img/select-product-1.jpg')}}" alt=""></td>
                                                            <td class="si-text">
                                                                <div class="product-selected">
                                                                    <p>$60.00 x 1</p>
                                                                    <h6>Kabino Bedside Table</h6>
                                                                </div>
                                                            </td>
                                                            <td class="si-close">
                                                                <i class="ti-close"></i>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="select-total">
                                                <span>total:</span>
                                                <h5>$120.00</h5>
                                            </div>
                                            <div class="select-button">
                                                <a href="#" class="primary-btn view-card">VIEW CARD</a>
                                                <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
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
                                    @php
                                    $articel = DB::table('tb_articel')->first();
                                    $testimony = DB::table('tb_testimony')->first();
                                    @endphp
                                    <li class="{{ $active == 'home' ? 'active' : '' }}"><a href="{{ route('home') }}">Beranda</a></li>
                                    <li class="{{ $active == 'about' ? 'active' : '' }}"><a href="{{ route('about') }}">Tentang Kami</a></li>
                                    <li class="{{ $active == 'login_mitra' ? 'active' : '' }}"><a href="{{ route('login.mitra') }}">Login</a></li>
                                    <li class="{{ $active == 'tool' ? 'active' : '' }}"><a href="{{ route('tool') }}">Tool</a></li>
                                    <li class="{{ $active == 'product' ? 'active' : '' }}"><a href="{{ route('shop.product') }}">Toko</a></li>
                                    <li class="{{ $active == 'articel' ? 'active' : '' }}"><a href="{{ route('blog', $articel->articel_id) }}">Artikel</a></li>
                                    <li class="{{ $active == 'partnership' ? 'active' : '' }}"><a href="{{ route('partnership') }}">FAQ</a></li>
                                    <!-- <li class="{{ $active == 'testimony' ? 'active' : '' }}"><a href="{{ route('testimon', $testimony->testimony_id) }}">Testimoni</a></li> -->
                                    <!-- <li class="{{ $active == 'login' ? 'active' : '' }}"><a href="{{ route('vendor') }}">Vendor</a></li> -->
                                    <!-- <li class="{{ $active == 'contact' ? 'active' : '' }}"><a href="{{ route('contact') }}">Bantuan</a></li> -->
                                    @if( Session::get('tokenUser') == false)
                                        <li class="{{ $active == 'regis' ? 'active' : '' }} daftar_aktif"><a href="{{ route('user.register') }}">Daftar</a></li>
                                        <li class="{{ $active == 'masuk' ? 'active' : '' }} daftar_aktif"><a href="{{ route('user.login') }}">Akun Belanjaku</a></li>
                                    @else
                                        <li class="daftar_aktif"><a href="#">{{Session::get('costumer_name')}}</a>
                                            <ul class="dropdown">
                                                <li><a href="{{ route('user.profile') }}">Profile</a></li>
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
    <br> <br> <br style="margin-bottom: 10px">