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
                            <ol>
                                <li>
                                    “ Technology is nothing. What's important is that you have a faith in people, that they're basically good and smart, and if you give them tools, they'll do wonderful things with them.” <span>- Steven Jobs</span>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection