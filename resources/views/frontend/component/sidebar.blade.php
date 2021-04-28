<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{url('backend/dashboard')}}" class="brand-link" style="text-align: center;">
        <!-- <img src="{{asset('lte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-light">
            <h3>SR12</h3>
        </span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview menu-open">
                    <a href="{{url('backend/dashboard')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('backend/admin')}}" class="nav-link">
                        <i class="nav-icon fas fa-user-alt"></i>
                        <p>
                            Admin
                        </p>
                    </a>
                </li>

                <li class="nav-header">Product</li>
                <li class="nav-item">
                    <a href="{{ route('category') }}" class="nav-link">
                        <i class="nav-icon fas fa-pencil-alt"></i>
                        <p>
                            Kategori Product
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('product') }}" class="nav-link">
                        <i class="nav-icon fas fa-box"></i>
                        <p>
                            List Product
                        </p>
                    </a>
                </li>

                <li class="nav-header">VENDOR</li>
                <!-- <li class="nav-item">
                    <a href="{{url('backend/jenis')}}" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Jenis UMKM
                        </p>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="{{url('backend/umkm')}}" class="nav-link">
                        <i class="nav-icon fas fa-coins"></i>
                        <p>
                            Data Vendor
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('backend/gambar')}}" class="nav-link">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            Data Gambar Barang
                        </p>
                    </a>
                </li>
                <li class="nav-header">LAYOUT</li>
                <li class="nav-item ">
                    <a href="{{url('backend/slider')}}" class="nav-link">
                        <i class="nav-icon fas fa-sliders-h"></i>
                        <p>
                            Data Slider
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{url('backend/iklan')}}" class="nav-link">
                        <i class="nav-icon fas fa-images"></i>
                        <p>
                            Data Iklan
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{url('backend/artikel')}}" class="nav-link">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Data Artikel
                        </p>
                    </a>
                </li>

                <li class="nav-header">KOMENTAR</li>
                <li class="nav-item ">
                    <a href="{{url('backend/pesan')}}" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Data Tanggapan
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>