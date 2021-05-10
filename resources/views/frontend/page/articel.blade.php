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
                            <p>travel <span>- {{ $articel->articel_tanggal }}</span></p>
                        </div>
                        <div class="blog-large-pic">
                            <img src="{{ asset('lte/dist/img/articel/' . $articel->articel_gambar )}}" alt="">
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-1">
                                </div>
                                <div class="col-10">
                                    <div class="blog-detail-desc">
                                        <p>{!! $articel->articel_isi !!}</p>
                                    </div>
                                    <div class="blog-more">
                                        <div class="row">
                                            @foreach($articelss as $no => $articels)
                                            <div class="col-sm-4">
                                                <a href="{{ route('blog', $articels->articel_id) }}">
                                                    <img src="{{ asset('lte/dist/img/articel/' . $articels->articel_gambar )}}" alt="">
                                                    <h5>{{ Str::limit($articels->articel_judul,50) }}</h5>
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