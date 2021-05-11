@extends ('frontend/layout.app')
@section ('title', 'Herbal Skincare')

@section ('content')

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-details-inner">
                        <div class="blog-detail-title">
                            <h2>{{ $articel->articel_judul }}</h2>
                            <p>Artikel <span>- {{ $articel->articel_tanggal }}</span></p>
                        </div>
                        <div class="blog-large-pic">
                            <img src="{{ asset('lte/dist/img/articel/' . $articel->articel_gambar )}}" alt="">
                        </div>
                        <div class="container contact-section spad">
                            <div class="row">
                                <div class="col-1">
                                </div>
                                <div class="col-10">
                                    <div class="blog-detail-desc">
                                        <p>{!! $articel->articel_isi !!}</p>
                                    </div>
                                    <div class="blog-more">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="contact-title">
                                                    <h4>Testimoni</h4>
                                                </div>
                                            </div>
                                            @foreach($articelss as $no => $testimonies)
                                            <div class="col-sm-4">
                                                <a href="{{ route('testimon', $testimonies->testimony_id) }}">
                                                    <img src="{{ asset('lte/dist/img/testimony/' . $testimonies->testimony_gambar )}}" alt="">
                                                    <h5>{{ Str::limit($testimonies->testimony_judul,50) }}</h5>
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

@endsection