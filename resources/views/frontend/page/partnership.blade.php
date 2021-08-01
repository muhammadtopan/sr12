@extends ('frontend/layout.app')
@section ('title', 'Herbal Skincare')

@section ('content')

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
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
    </div>
    <!-- Breadcrumb Section Begin -->


    <!-- Faq Section Begin -->
    <div class="faq-section spad">
        <div class="container">
            <div class="row">
                <div class="col-12">
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
                            <!-- <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseTwo">
                                        Where Can I Find Market Research Reports?
                                    </a>
                                </div>
                                <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseThree">
                                        Where Can I Find The Wall Street Journal?
                                    </a>
                                </div>
                                <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat.</p>
                                    </div>
                                </div>
                            </div> -->
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
                            <h2>CARA BELANJA DI SR12 HERBAL STORE</h2>
                            <p>Berikut ini merupakan panduan cara belanja yang sering ditanyakan di Marketplace SR12 Herbal Store:</p>
                        </div>
                        <div class="blog-quote">
                            <p>“ Technology is nothing. What's important is that you have a faith in people, that
                                they're basically good and smart, and if you give them tools, they'll do wonderful
                                things with them.” <span>- Steven Jobs</span></p>
                            <p>“ Technology is nothing. What's important is that you have a faith in people, that
                                they're basically good and smart, and if you give them tools, they'll do wonderful
                                things with them.” <span>- Steven Jobs</span></p>
                            <p>“ Technology is nothing. What's important is that you have a faith in people, that
                                they're basically good and smart, and if you give them tools, they'll do wonderful
                                things with them.” <span>- Steven Jobs</span></p>
                            <p>“ Technology is nothing. What's important is that you have a faith in people, that
                                they're basically good and smart, and if you give them tools, they'll do wonderful
                                things with them.” <span>- Steven Jobs</span></p>
                            <p>“ Technology is nothing. What's important is that you have a faith in people, that
                                they're basically good and smart, and if you give them tools, they'll do wonderful
                                things with them.” <span>- Steven Jobs</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection