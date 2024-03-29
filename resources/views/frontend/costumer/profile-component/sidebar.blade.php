<aside class="main-sidebar sidebar-light-warning">
    <a href="{{ route('home')}}" class="brand-link" style="height: 48px;">
        <!-- <img src="{{asset('lte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
            <span class="brand-text font-weight-light text-center">
                <h2>SR12</h2>
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
                    {{ Session::get("costumer_name") }}
                </a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('user.profile')}}" class="nav-link {{ $active == 'akun' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.profile.keranjang') }}" class="nav-link {{ $active == 'keranjang' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Keranjang
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.profile.bayar') }}" class="nav-link {{ $active == 'bayar' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-coins"></i>
                        <p>
                            Bayar
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.barang.sampai') }}" class="nav-link {{ $active == 'completed' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Barang Sampai
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{ $active == 'history' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Pengaturan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.profile.voucher') }}" class="nav-link {{ $active == 'voucher' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Voucher
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-in-alt"></i>
                        <p>
                            Kembali
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
