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
                            <div class="logo">
                                <a href="{{('home')}}">
                                    <img src="{{ asset('frontend/img/logo.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-10 text-right col-md-10">
                            <nav class="nav-menu mobile-menu mt-3">
                                <ul>
                                    <li class="{{ $active == 'home' ? 'active' : '' }}"><a href="{{ route('home') }}">Beranda</a></li>
                                    <li class="{{ $active == 'about' ? 'active' : '' }}"><a href="{{ route('about') }}">Tentang Kami</a></li>
                                    <li class="{{ $active == 'product' ? 'active' : '' }}"><a href="{{ route('shop.product') }}">Toko</a></li>
                                    @php
                                        $articel = DB::table('tb_articel')->first();
                                        $testimony = DB::table('tb_testimony')->first();
                                    @endphp
                                    <li class="{{ $active == 'articel' ? 'active' : '' }}"><a href="{{ route('blog', $articel->articel_id) }}">Artikel</a></li>
                                    <li class="{{ $active == 'testimony' ? 'active' : '' }}"><a href="{{ route('testimon', $testimony->testimony_id) }}">Testimoni</a></li>
                                    <li class="{{ $active == 'login' ? 'active' : '' }}"><a href="{{ route('vendor') }}">Mitra</a></li>
                                    <li class="{{ $active == 'partnership' ? 'active' : '' }}"><a href="{{ route('partnership') }}">FAQ</a></li>
                                    <!-- <li class="{{ $active == 'contact' ? 'active' : '' }}"><a href="{{ route('contact') }}">Bantuan</a></li> -->
                                    @if( Session::get('tokenUser') == false)
                                        <li class="{{ $active == 'masuk' ? 'active' : '' }}"><a href="{{ route('user.login') }}">Masuk</a></li>
                                    @else
                                        <li><a href="#">Akun</a>
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