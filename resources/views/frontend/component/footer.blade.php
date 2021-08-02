    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <!-- <div class="footer-logo">
                            <a href="#"><img src="{{ asset('frontend/img/logo.png') }}" alt=""></a>
                        </div> -->
                        <ul>
                            <li>Alamat: 60-49 Road 11378 New York</li>
                            <li>Telepon: +62 832 6541 6547</li>
                            <li>Email: sr12herbalstore@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.instagram.com/sr12herbalstore"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                @php
                    $articel = DB::table('tb_article')->first();
                    $testimony = DB::table('tb_testimony')->first();
                @endphp
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Informasi</h5>
                        <ul>
                            <li><a href="{{ route('about') }}">Tentang Kami</a></li>
                            @if ($articel != null)
                                <li><a href="{{ route('blog', $articel->article_id) }}">Artikel</a></li>
                            @endif
                            <li><a href="{{ route('syarat_mitra') }}">Mitra</a></li>
                            <li><a href="{{ route('partnership') }}">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>SR12 Herbal Store</h5>
                        <ul>
                            <li><a href="{{ route('user.login') }}">Akun Belanjaku</a></li>
                            <li><a href="#">Katalog</a></li>
                            <!-- <li><a href="#">Keranjang</a></li> -->
                            <li><a href="{{ route('shop.product') }}">Toko</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Gabung Bersama Kami</h5>
                        <p>Dapatkan E-mail pemberitahuan tentang update terbaru SR12 Herbal Store.</p>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="Enter Your Mail">
                            <button type="button">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://instagram.com/taufanomt" target="_blank">Taufano</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <div class="payment-pic">
                            <!-- <img src="{{ asset('frontend/img/payment-method.png')}}" alt=""> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->
