<aside class="main-sidebar sidebar-dark-warning elevation-4">
    @if( Session::get('admin_level') == 'admin' && Session::get("user_level")  == null )
        <a href="{{ route('admin.dashboard')}}" class="brand-link" style="text-align: center; height: 48px;">
            <!-- <img src="{{asset('lte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
                <span class="brand-text font-weight-light">
                    <h3>SR12</h3>
                </span>
        </a>
    @else
        <a href="{{ route('vendor.dashboard')}}" class="brand-link" style="text-align: center; height: 48px;">
                <span class="brand-text font-weight-light">
                    <h3>{{ session()->get('username') }}</h3>
                </span>
        </a>
    @endif
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">

            <!-- <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                        Level 1
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Level 2</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                                Level 2
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Level 3</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Level 3</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Level 3</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Level 2</p>
                        </a>
                    </li>
                </ul>
            </li> -->
            @if( Session::get('admin_level') == 'admin' && Session::get("user_level")  == null )
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard')}}" class="nav-link {{ $active == 'dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item {{ $active == 'product_category' || $active == 'product' || $active == 'category_opp'|| $active == 'product_package' ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link {{ $active == 'product_category' || $active == 'product' || $active == 'category_opp'|| $active == 'product_package' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-coins"></i>
                        <p>
                            Produk
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('category') }}" class="nav-link {{ $active == 'product_category' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kategori Produk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('product') }}" class="nav-link {{ $active == 'product' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daftar Produk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('category_opp') }}" class="nav-link {{ $active == 'category_opp' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kategori Paket</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('package_category') }}" class="nav-link {{ $active == 'product_package' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Paket Produk</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ $active == 'vendor' || $active == 'freelance'|| $active == 'costumer'|| $active == 'orderan'|| $active == 'daftar_mitra'|| $active == 'katalog'|| $active == 'viewer_syarat'|| $active == 'ulasan'|| $active == 'tarik' ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link {{ $active == 'vendor' || $active == 'freelance'|| $active == 'costumer'|| $active == 'orderan'|| $active == 'daftar_mitra'|| $active == 'katalog'|| $active == 'viewer_syarat'|| $active == 'ulasan'|| $active == 'tarik' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Data Website
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('data_vendor') }}" class="nav-link {{ $active == 'vendor' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Vendor</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('freelance_data') }}" class="nav-link {{ $active == 'freelance' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Freelancer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('data_costumer') }}" class="nav-link {{ $active == 'costumer' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Costumer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('data_order') }}" class="nav-link {{ $active == 'orderan' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Orderan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('daftar_mitra') }}" class="nav-link {{ $active == 'daftar_mitra' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daftar Mitra</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('data_katalog') }}" class="nav-link {{ $active == 'katalog' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Katalog</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('viwer_syarat') }}" class="nav-link {{ $active == 'viewer_syarat' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Viewer Syarat</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ulasan') }}" class="nav-link {{ $active == 'ulasan' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ulasan</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="{{ route('tarik_dana') }}" class="nav-link {{ $active == 'tarik' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tarik Dana</p>
                            </a>
                        </li> -->
                    </ul>
                </li>

                <li class="nav-item {{ $active == 'active' || $active == 'mitra' ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link {{ $active == 'active' || $active == 'mitra' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Spotlight Team
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('data_vendor.gudang')}}" class="nav-link {{ $active == 'active' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gudang</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ $active == 'mitra' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mitra</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ $active == 'voucher' || $active == 'reedem' ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link {{ $active == 'voucher' || $active == 'reedem' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-ticket-alt"></i>
                        <p>
                            Voucher
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview">
                            <a href="{{ route('voucher')}}" class="nav-link {{ $active == 'voucher' ? 'active' : '' }}">
                                <p>
                                    <i class="far fa-circle nav-icon"></i>
                                    Voucher
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('voucher.redeem')}}" class="nav-link {{ $active == 'reedem' ? 'active' : '' }}">
                                <p>
                                    <i class="far fa-circle nav-icon"></i>
                                    Redeem Voucher
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item {{ $active == 'article_category' || $active == 'article' ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link {{ $active == 'article_category' || $active == 'article' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Artikel
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('acat')}}" class="nav-link {{ $active == 'article_category' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Kategori Artikel
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('article')}}" class="nav-link {{ $active == 'article' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Artikel
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-item has-treeview">
                    <a href="{{ route('syarat')}}" class="nav-link {{ $active == 'faq' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-question-circle"></i>
                        <p>
                            FAQ
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="{{ route('testimony')}}" class="nav-link {{ $active == 'testy' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-comment-dots"></i>
                        <p>
                            Testimoni
                        </p>
                    </a>
                </li>
            @else
                <li class="nav-item has-treeview menu-open">
                    <a href="{{ route('vendor.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('vendor.update.profile')}}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('stock')}}" class="nav-link">
                        <i class="nav-icon fas fa-coins"></i>
                        <p>
                            Product
                        </p>
                    </a>
                </li>
                @php
                $jumlah_orderan = DB::table('tb_order')
                            ->where('tb_order.user_id', Session::get('user_id'))
                            ->where('order_status', 'waiting')
                            ->count();
                @endphp
                <li class="nav-item">
                    <a href="{{ route('vendor.order')}}" class="nav-link">
                        <i class="nav-icon fas fa-cart-arrow-down"></i>
                        <p>
                            Orderan
                            <span class="badge badge-danger right">{{ $jumlah_orderan }}</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('vendor.deposit')}}" class="nav-link">
                        <i class="nav-icon fas fa-money-bill"></i>
                        <p>
                            Histori Deposit
                        </p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            Stok Produk
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Level 2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Level 2
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Level 2</p>
                            </a>
                        </li>
                    </ul>
                </li> -->
            @endif
            </ul>
        </nav>
    </div>
</aside>
