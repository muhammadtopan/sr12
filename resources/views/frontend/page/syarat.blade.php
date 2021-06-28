@extends ('frontend/layout.app')
@section ('title', 'Herbal Skincare')

@section ('content')

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Beranda</a>
                        <span>Mitra</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

        <!-- Syarat Begin -->
        <section class="product-shop spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                        <div class="filter-widget">
                            <h4 class="fw-title">MITRA RESMI SR12</h4>
                            <ul class="filter-catagories">
                                <li><a class="btn btn-rounded" href="#">Persebaran Mitra </a></li>
                                <li><a href="#">Keunggulan</a></li>
                                <li><a href="#">Ketentuan Umum</a></li>
                                <li><a href="#">Target Mitra</a></li>
                                <li>
                                    <a href="#">
                                        Cara Gabung
                                    </a>
                                    <ul class="pl-4">
                                        <li>Marketer</li>
                                        <li>Reseler</li>
                                        <li>Sub-Agen</li>
                                        <li>Agen</li>
                                    </ul>
                                </li>
                                <li><a href="#">Dristributor Utama</a></li>
                                <li><a href="#">Kenapa SR12</a></li>
                                <li><a href="#">Kenapa Harus Gabung</a></li>
                                <li><a href="#">Kesimpulan</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8 order-1 order-lg-2">
                        <div class="product-list">
                            <div class="row">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non numquam commodi, qui pariatur ex eum, aliquid nemo eligendi in, reprehenderit inventore a ducimus culpa. Porro dicta aperiam aliquam possimus eum.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Product Shop Section End -->

@endsection