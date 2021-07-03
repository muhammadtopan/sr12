<aside class="main-sidebar sidebar-light-danger">
    <a href="{{ route('gudang.dashboard')}}" class="brand-link" style="height: 48px;">
        <img src="{{asset('lte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">
                <h3>SR12</h3>
            </span>
    </a>
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('lte/dist/img/a.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block" style="text-transform: capitalize">
                    {{Session::get("auth")->nama_gudang}} - {{Session::get("auth")->level}}
                </a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-legacy" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('gudang.dashboard')}}" class="nav-link {{ $active == 'dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('gudang.profile') }}" class="nav-link {{ $active == 'profile' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Data Diri
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('gudang.stock') }}" class="nav-link {{ $active == 'stock' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-coins"></i>
                        <p>
                            Produk
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('gudang.mitra') }}" class="nav-link {{ $active == 'mitra' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Mitra
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ $active == 'ro' || $active == 'orderan' || $active == 'sale' || $active == 'best_seller' ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link {{ $active == 'ro' || $active == 'orderan' || $active == 'sale' || $active == 'best_seller' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-box"></i>
                        <p>
                            Orderan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('gudang.orderan') }}" class="nav-link {{ $active == 'orderan' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daftar Orderan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('gudang.ro') }}" class="nav-link {{ $active == 'ro' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>RO</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('gudang.sale') }}" class="nav-link {{ $active == 'sale' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sale</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('gudang.best_seller') }}" class="nav-link {{ $active == 'best_seller' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Best Seller</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('gudang.history') }}" class="nav-link {{ $active == 'history' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-history"></i>
                        <p>
                            History
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('gudang.profit') }}" class="nav-link {{ $active == 'profit' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>
                            Profit
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('gudang.laporan') }}" class="nav-link {{ $active == 'laporan' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Laporan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('gudang.setting') }}" class="nav-link {{ $active == 'setting' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Pengaturan
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
