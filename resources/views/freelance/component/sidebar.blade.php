<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('admin.dashboard')}}" class="brand-link" style="text-align: center; height: 48px;">
        <!-- <img src="{{asset('lte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
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
            <a href="#" class="d-block">Username Freelance</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('freelance')}}" class="nav-link   ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('freelance.profile') }}" class="nav-link {{ $active == 'profile' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Data Diri
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('freelance.r.transaksi') }}" class="nav-link {{ $active == 'rtransaksi' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Riwayat Transaksi
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('freelance.r.affiliate') }}" class="nav-link {{ $active == 'raffiliate' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-cog"></i>
                        <p>
                            Riwayat Affiliate
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('freelance.deposite') }}" class="nav-link {{ $active == 'deposite' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-money-check"></i>
                        <p>
                            Deposit
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
