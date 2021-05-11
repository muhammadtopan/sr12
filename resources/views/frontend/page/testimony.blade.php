@extends ('frontend/layout.app')
@section ('title', 'Herbal Skincare')

@section ('content')

    <!-- Blog Details Section Begin -->
    <section class="blog-details contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-title">
                        <h4>Testimoni</h4>
                    </div>
                    <div class="blog-details-inner">
                        <div class="blog-detail-title">
                            <h2>{{ $testimony->testimony_judul }}</h2>
                            <p> {{ $testimony->testimony_category }} </p>
                        </div>
                        <div class="blog-large-pic">
                            <img src="{{ asset('lte/dist/img/testimony/' . $testimony->testimony_gambar )}}" alt="">
                        </div>
                        <div class="container contact-section spad">
                            <div class="row">
                                <div class="col-1">
                                </div>
                                <div class="col-10">
                                    <div class="blog-more">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="contact-title">
                                                    <h4>Testimoni Lainnya</h4>
                                                </div>
                                            </div>
                                            @foreach($testimonyss as $no => $testimonies)
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