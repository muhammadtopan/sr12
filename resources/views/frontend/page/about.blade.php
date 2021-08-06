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
                        <span>Tentang Kami</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->
    
    <section class="mt-3 set-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 set-bg" data-setbg="{{ asset('frontend/img/logo.png')}}">
                    <!-- <div class="logo-about">
                        <a href="#"><img src="{{ asset('frontend/img/logo.png') }}" alt=""></a>
                    </div> -->
                </div>
                <div class="col-lg-5">
                    <h4><b>SR12 HERBAL SKINCARE</b></h4>
                    <div class="ml-4">
                        <ul>
                            <p class="mb-1">Perusahaan yang bergerak di Bidang Herbal dan Skincare</p>
                            <p class="mb-1">Produk dalam Negri</p>
                            <p class="mb-1">Manfaat produk spesifik sesuai kebutuhan (masalah dan jenis kulit)</p>
                            <p class="mb-1">Sudah terdaftar BPOM</p>
                            <p class="mb-1">Bebas dari Mercury & Hydroquinon</p>
                            <p class="mb-1">Mitra tersebar di seluruh Indonesia</p>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5">
                    <h4><b>Skin Relieve 12 masalah kulit :</b></h4>
                    <div class="row">
                        <div class="col-md-5 ml-4">
                            <p class="mb-1">Kulit Kusam</p>
                            <p class="mb-1">Mata Panda</p>
                            <p class="mb-1">Kulit Berminyak</p>
                            <p class="mb-1">Kulit Bruntus</p>
                            <p class="mb-1">Kulit Berjerawat</p>
                            <p class="mb-1">Noda Bekas</p>
                        </div>
                        <div class="col-md-5 ml-4">
                            <p class="mb-1">Kulit Berflex Hitam</p>
                            <p class="mb-1">Komedo</p>
                            <p class="mb-1">Kulit Kering</p>
                            <p class="mb-1">Kulit Kendur</p>
                            <p class="mb-1">Kulit Keriput</p>
                            <p class="mb-1">Stretch Mark</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PROFIL COMPANY SR12 Begin -->
    <section class="latest-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>PROFIL COMPANY SR12</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <div class="latest-text">
                            <a href="#">
                                <h4>SR12 Herbal Skincare adalah</h4>
                            </a>
                            <p>PT. SR12 Herbal Kosmetik adalah perusahaan yang bergerak di Bidang Herbal & skincare. Didirikan pada tahun 2015 oleh Tony Firmansyah, S.Farm., Apt. & Asrianty Salam, S.Farm. PT. SR12 Herbal Perkasa saat ini memiliki 3 pabrik yang terletak di provinsi Jawa Barat, dan ditangani oleh tenaga profesional di bidangnya.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <div class="latest-text">
                            <a href="#">
                                <h4>Apakah Produk SR12 Aman & Halal?</h4>
                            </a>
                            <p>Produk-produk yang dipasarkan oleh perusahaan merupakan produk yang telah melalui serangkaian uji dari beberapa saintifis yang bersertifikasi, teruji di Laboratorium Sucofindo dan bebas dari Mercury & Hydroquinon serta telah terdaftar di <a href="#"> BPOM RI.</a> </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <div class="latest-text">
                            <a href="#">
                                <h4>Produk SR12 dan Manfaatnya</h4>
                            </a>
                            <p>Produk SR12 Herbal Skincare memiliki banyak varian yang semuanya memiliki fungsi masing-masing sesuai dengan peruntukannya. Konsultasikan permasalahan yang kamu alami agar kami bisa merekomendasikan produk yang tepat sesuai dengan jenis dan masalah kulitmu.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- PROFIL COMPANY SR12 End -->

    <!-- SR12 HERBAL SKINCARE Begin -->
    <section class="latest-blog spad">
        <div class="container blog-details-inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>SR12 HERBAL SKINCARE</h2>
                    </div>
                </div>
            </div>
            <div class="blog-post">
                <div class="row">
                    <div class="col-lg-4 col-md-6 prev-blog mb-4">
                        <div class="pb-pic">
                            <img src="{{asset('frontend/img/about/1.jpeg')}}" alt="">
                        </div>
                        <div class="pb-text">
                            <span>Senior Distributor Resmi SR12 Skincare</span>
                            <H6>Jaminan produk original, legal, resmi, dan ber-BPOM Mitra resmi tersebar setiap Kota/Kabupaten</H6>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 prev-blog mb-4">
                        <div class="pb-pic">
                            <img src="{{asset('frontend/img/about/2.jpeg')}}" alt="">
                        </div>
                        <div class="pb-text">
                            <span>Diskon Reseler</span>
                            <H6>Mitra reseler mendapatkan diskon 20% dari setiap pembelanjaan. Berpeluang menjadi Mitra (Vendor) SR12 Herbal Store</H6>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 prev-blog mb-4">
                        <div class="pb-pic">
                            <img src="{{asset('frontend/img/about/3.jpeg')}}" alt="">
                        </div>
                        <div class="pb-text">
                            <span>Konsultasi Gratis</span>
                            <H6>Sampaikan keluhan permasalahan yang dialami Akan dilayani oleh mitra/konsultan SR12 yang berpengalaman</H6>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 prev-blog mb-4">
                        <div class="pb-pic">
                            <img src="{{asset('frontend/img/about/4.jpeg')}}" alt="">
                        </div>
                        <div class="pb-text">
                            <span>Peluang Agen</span>
                            <H6>Mitra Agen mendapatkan diskon lebih besar dan berpeluang besar menjadi pemasok/ distributor area setiap Kota/ Kabupaten</H6>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 prev-blog mb-4">
                        <div class="pb-pic">
                            <img src="{{asset('frontend/img/about/5.jpeg')}}" alt="">
                        </div>
                        <div class="pb-text">
                            <span>Bimbingan Bisnis</span>
                            <H6>Bimbingan bisnis akan dibantu oleh Senior Distributor Manfaatkan kebutuhan produk menjadi peluang bisnis</H6>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 prev-blog mb-4">
                        <div class="pb-pic">
                            <img src="{{asset('frontend/img/about/6.jpeg')}}" alt="">
                        </div>
                        <div class="pb-text">
                            <span>Peluang Distributor</span>
                            <H6>Terbuka untuk semua mitra SR12 Ada bimbingan dan konsultasi khusus</H6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- SR12 HERBAL SKINCARE End -->

    <!-- SENIOR DISTRIBUTOR SR12 HERBAL SKINCARE Begin -->
    <section class="latest-blog spad">
        <div class="container blog-details-inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>SENIOR DISTRIBUTOR SR12 HERBAL SKINCARE</h2>
                    </div>
                </div>
            </div>
            <div class="blog-detail-desc">
                <p>
                    SR12 Herbal Skincare adalah perusahaan yang bergerak menumbuhkembangkan ekonomi masyarakat Indonesia. Membuka peluang usaha dan bisnis untuk setiap orang yang mau berjuang dan siap untuk tumbuh, dimana peluang Distributor terbuka lebar untuk semua Mitra SR12. Kami merupakan Senior Distributor SR12 sejak 2017 dan siap membantu mitra-mitra baru yang ingin bergabung dan tumbuh bersama kami.
                </p>
                <p>
                    Kami membuka kesempatan seluas-luasnya untuk kamu yang beniat untuk menjadi mitra kami. Kesempatan bergabung menjadi mitra SR12 memiliki keuntungan lebih dibanding jika kamu hanya sebagai konsumen. Kami memiliki sistem dan bimbingan mitra yang bergabung bersama kami. kamu dapat memulainya sesuai posisi mitra yang sesuai dengan Passion bisnismu.
                </p>
            </div>
            <div class="blog-large-pic">
                <img src="{{asset('frontend/img/seniordu.png')}}" alt="">
            </div>
        </div>
    </section>
    <!-- SENIOR DISTRIBUTOR SR12 HERBAL SKINCARE End -->

    <!-- KEUNTUNGAN BELANJA DI MARKETPLACE SR12 HERBAL STORE Begin -->
    <section class="latest-blog spad">
        <div class="container blog-details-inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>KEUNTUNGAN BELANJA DI MARKETPLACE SR12 HERBAL STORE</h2>
                    </div>
                    <div class="row">
                        <div class="blog-quote col-lg-12 col-md-12">
                            <p>
                                Mendapatkan akun konsumen AKUN BELANJAKU sehingga bisa belanja produk SR12 dimana saja (melalui website marketplace SR12 Herbal Store)
                            </p>
                            <p>
                                Bisa mendapatkan produk SR12 dari Mitra terdekat di setiap Kota/Kabupaten di seluruh Indonesia
                            </p>
                            <p>
                                Biaya ongkir lebih murah karena produk dikirim dari mitra terdekat
                            </p>
                            <p>
                                Mendapatkan Voucher Point dari setiap total pembelanjaan dan bisa ditukarkan dengan Give menarik untuk langganan setia SR12 Herbal Store
                            </p>
                            <p>
                                Beli produk SR12 1 Pcs berpeluang menjadi Mitra SR12, khusus Marketer
                            </p>
                            <p>
                                Dapat Sharing Profit sebesar 15% dari totalan omset produk (khusus Marketer)
                            </p>
                            <p>
                                Sharing Profit dapat dicairkan setiap awal bulan sesuai syarat dan ketentuan Marketer
                            </p>
                            <p>
                                Bisa ikut jualan dan promosi melalui sistem dropship (Hubungi admin website)
                            </p>
                            <p>
                                Mendapatkan konsultasi gratis manfaat produk dan konsultasi masalah kulit 
                            </p>
                            <p>
                                Ketersediaan dan keaslian produk terjamin 
                            </p>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="single-latest-blog">
                                <div class="latest-text">
                                    <!-- <a href="#">
                                        <h4>Bisa Gabung Jadi Mitra SR12 Herbal Skincare</h4>
                                    </a> -->
                                    <div class="section-title">
                                        <h2>Bisa Gabung Jadi Mitra SR12 Herbal Skincare</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Partner Logo Section Begin -->
                    <div class="partner-logo">
                        <div class="container">
                            <div class="logo-carousel owl-carousel">
                                <div class="logo-item">
                                    <div class="tablecell-inner">
                                        <h3 class="text-white">Marketer <i class="fa fa-arrow-circle-right"></i></h3>
                                    </div>
                                </div>
                                <div class="logo-item">
                                    <div class="tablecell-inner">
                                        <h3 class="text-white">Reseller <i class="fa fa-arrow-circle-right"></i></h3>
                                    </div>
                                </div>
                                <div class="logo-item">
                                    <div class="tablecell-inner">
                                        <h3 class="text-white">Sub-Agen <i class="fa fa-arrow-circle-right"></i></h3>
                                    </div>
                                </div>
                                <div class="logo-item">
                                    <div class="tablecell-inner">
                                        <h3 class="text-white">Agen <i class="fa fa-arrow-circle-right"></i></h3>
                                    </div>
                                </div>
                                <div class="logo-item">
                                    <div class="tablecell-inner">
                                        <h3 class="text-white py-1 px-3 rounded " style="border: 3px solid #fff">Distributor </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Partner Logo Section End -->
                    <div class="blog-detail-desc">
                        <p>
                        Kami membuka kesempatan seluas-luasnya untuk kamu yang berniat untuk menjadi mitra kami. Kesempatan bergabung menjadi mitra SR12 memiliki keuntungan lebih dibanding jika kamu hanya sebagai konsumen. Kami memiliki sistem dan bimbingan mitra atau member yang bergabung bersama kami. Kamu dapat memulainya dari tingkatan marketer, reseller, sub-agen, ataupun agen sr12 skincare. Untuk syarat dan ketentuan menjadi Mitra SR12 :
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="blog-more">
            <div class="row text-center">
                <div class="col-sm-3">
                    <img src="{{asset('frontend/img/about/syarat/syarat_marketer.jpeg')}}" alt="">
                    <p>Untuk syarat lengkapnya <a href="#">(KLIK DISINI)</a></p>
                </div>
                <div class="col-sm-3">
                    <img src="{{asset('frontend/img/about/syarat/syarat_reseller.jpeg')}}" alt="">
                    <p>Untuk syarat lengkapnya <a href="#">(KLIK DISINI)</a></p>
                </div>
                <div class="col-sm-3">
                    <img src="{{asset('frontend/img/about/syarat/syarat_sub_agen.jpeg')}}" alt="">
                    <p>Untuk syarat lengkapnya <a href="#">(KLIK DISINI)</a></p>
                </div>
                <div class="col-sm-3">
                    <img src="{{asset('frontend/img/about/syarat/syarat_agen.jpeg')}}" alt="">
                    <p>Untuk syarat lengkapnya <a href="#">(KLIK DISINI)</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- KEUNTUNGAN BELANJA DI MARKETPLACE SR12 HERBAL STORE End -->

    <!-- National Distibutor Convention (NDC) Begin -->
    <section class="latest-blog spad">
        <div class="container blog-details-inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>National Distibutor Convention (NDC)</h2>
                    </div>
                    <div class="blog-detail-desc">
                        <p>
                            National Distributor Convention atau lebih dikenal dengan istilah NDC. NDC merupakan agenda tahunan perusahaan SR12 Herbal Skincare yang biasanya dilaksanakan pada akhir-akhir tahun. Kegiatan NDC merupakan perwujudan kepedulian perusahaan terhadap mitra distributor utama SR12 di seluruh Indonesia. Kepedulian ini merupakan aplikasi dari meningkatkan kekuatan usaha secara bersama dan terus melakukan pembenahan-pembenahan setiap tahunnya sesuai dengan perubahan dan tuntutan era digital saat sekarang ini. Untuk setiap perubahan peraturan dan kebutuhan pasar, SR12 selalu melibatkan mitra Distributor di dalamnya.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- National Distibutor Convention (NDC) End -->

    <!-- Kategori & Katalog Produk SR12 Skincare  Begin -->
    <section class="latest-blog spad">
        <div class="container blog-details-inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Kategori & Katalog Produk SR12 Skincare </h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="single-latest-blog">
                                <p>
                                    Berikut ini merupakan katalog produk sr12 terbaru dengan beberapa update harga dan penambahan produk baru. 
                                    <p>
                                        Kamu bisa mendownloadnya dengan mengisi form di bawah ini. 
                                    </p> 
                                    <p>
                                        Katalog akan langsung dikirim lewat email kamu masing-masing. 
                                    </p>
                                    <p>
                                        Pastikan emailmu aktif agar link download katalog sr12 skincare bisa kami kirimkan.
                                    </p>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">.
                            <div class="leave-comment">
                                @if(Session::has('messages'))
                                    <p class="alert alert-info">{{ Session::get('messages') }}</p>
                                @endif
                                <form action="{{ route('download-katalog')}}" method="post" class="comment-form">
                                    @csrf
                                    @if(session('errors'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            Ada yang salah:
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input name="name" type="text" placeholder="Name" value="{{ old('name') }}">
                                        </div>
                                        <div class="col-lg-6">
                                            <input name="email" type="text" placeholder="Email" value="{{ old('email') }}">
                                        </div>
                                        <div class="col-lg-12 text-right">
                                            <button type="submit" class="site-btn">Download</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="blog-large-pic">
                        <img src="{{asset('frontend/img/products.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Kategori & Katalog Produk SR12 Skincare  End -->

@endsection