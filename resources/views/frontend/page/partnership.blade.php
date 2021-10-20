@extends ('frontend/layout.app')
@section ('title', 'Herbal Skincare')

@section ('content')

    <!-- Breadcrumb Section Begin -->
    <!-- <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>FAQs</span>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Breadcrumb Section Begin -->

    <!-- Faq Section Begin -->
    <div class="faq-section spad pb-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2 style="font-size: 24px">PERTANYAAN YANG BANYAK MUNCUL KETIKA MENSOSIALISASIKAN SR12 HERBAL STORE</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="faq-accordin">
                        <div class="accordion" id="accordionExample">
                            
                            @foreach( $syarat as $no => $syarats)
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne{{ $syarats->syarat_id }}">
                                            {{ $syarats->syarat_judul }}
                                        </a>
                                    </div>
                                    <div id="collapseOne{{ $syarats->syarat_id }}" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p>{!! $syarats->syarat !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Faq Section End -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-details-inner">
                        <div class="blog-detail-title">
                            <h2 style="font-size: 24px">CARA BELANJA DI SR12 HERBAL STORE</h2>
                            {{-- <p>Berikut ini merupakan panduan cara belanja yang sering ditanyakan di Marketplace SR12 Herbal Store:</p> --}}
                        </div>
                        <div class="blog-quote">
                            <ol class="pl-5" style="font-size: 14px">
                                <li>
                                Searching www.sr12herbalstore.com
                                </li>
                                <li>
                                Masuk ke Menu DAFTAR
                                </li>
                                <li>
                                Isikan data diri dan alamat sesuai KTP
                                </li>
                                <li>
                                Setelah akun selesai dibuat, bisa Log In melalui Menu Akun Belanjaku
                                </li>
                                <li>
                                Pilih produk/ paket produk sesuai kebutuhan (atau masuk ke Menu Toko)
                                </li>
                                <li>
                                Pilih produk & jumlahnya, klik ADD TO CARD
                                </li>
                                <li>
                                Setelah pilih produk, LIHAT KERANJANG
                                </li>
                                <li>
                                Silahkan CHECKOUT produk dulu sesuai jumlah yang dibutuhkan
                                </li>
                                <li>
                                Klik LOHAT tagihan
                                </li>
                                <li>
                                Isikan Rincian Penagihan, alamat pengiriman produk, Provinsi, Kota/Kabupaten, Pilih vendor terdekat (bisa sesuai kecamatan jika sudah ada), pilih jenis pengiriman, pilih rekening Bank untuk pembayaran
                                </li>
                                <li>
                                Silahkan untuk proses pembayaran sesuai rekening bank yang tersedia
                                </li>
                                <li>
                                Setelah proses pembayaran selesai, bukti transfer bisa di post di halaman BAYAR. Silahkan tambahkan keterangan di bawahnya
                                </li>
                                <li>
                                Setelah selesai, masuk ke Profil AKUN BELANJAKU
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection