<aside class="main-sidebar sidebar-dark-primary elevation-4">
    @if( Session::get('admin_0level') == 'admin' && Session::get("user_level")  == null )
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
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

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
                    <a href="{{ route('admin.dashboard')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-coins"></i>
                        <p>
                            Produk
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('product') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daftar Produk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('category') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kategori Produk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('package_category') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Paket Produk</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Spotlight
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route("data_vendor.gudang")}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gudang</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mitra</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('data_vendor') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Vendor</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Freelancer</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-ticket-alt"></i>
                        <p>
                            Voucher
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview">
                            <a href="{{ route('voucher')}}" class="nav-link">
                                <p>
                                    <i class="far fa-circle nav-icon"></i>
                                    Voucher
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('voucher.redeem')}}" class="nav-link">
                                <p>
                                    <i class="far fa-circle nav-icon"></i>
                                    Redeem Voucher
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="{{ route('articel')}}" class="nav-link">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Artikel
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="{{ route('syarat')}}" class="nav-link">
                        <i class="nav-icon fas fa-question-circle"></i>
                        <p>
                            FAQ
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="{{ route('testimony')}}" class="nav-link">
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
                    <a href="{{ route('stock')}}" class="nav-link">
                        <i class="nav-icon fas fa-coins"></i>
                        <p>
                            Product
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
