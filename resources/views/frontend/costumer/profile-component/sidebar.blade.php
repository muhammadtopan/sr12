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
                    Costumer
                    {{-- {{Session::get("auth")->nama_gudang}} - {{Session::get("auth")->level}} --}}
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
                    <a href="{{ route('user.profile.keranjang') }}" class="nav-link {{ $active == 'profile' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Keranjang
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('gudang.stock') }}" class="nav-link {{ $active == 'stock' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-coins"></i>
                        <p>
                            Bayar
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('gudang.mitra') }}" class="nav-link {{ $active == 'mitra' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Barang Sampai
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('gudang.mitra') }}" class="nav-link {{ $active == 'mitra' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Histori Produk
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('gudang.history') }}" class="nav-link {{ $active == 'history' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-history"></i>
                        <p>
                            Pengaturan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('gudang.profit') }}" class="nav-link {{ $active == 'profit' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>
                            Point
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.profile.voucher') }}" class="nav-link {{ $active == 'laporan' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Voucher
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('gudang.setting') }}" class="nav-link {{ $active == 'setting' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
