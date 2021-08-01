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
                        <span>Artikel</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="blog-details-inner">
                        <div class="blog-detail-title">
                            <h2>{{ $artikel->article_judul }}</h2>
                            <p>SR12 Herbal Store</p>
                        </div>
                        <div class="container contact-section spad">
                            <div class="row">
                                <div class="col-1">
                                </div>
                                <div class="col-10">
                                    <div class="blog-detail-desc">
                                        <p>{!! $artikel->article_isi !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="blog-sidebar">
                        <div class="recent-post">
                            <h4>Artikel</h4>
                            <div class="recent-blog">
                                <div class="faq-accordin">
                                    <div class="accordion" id="accordionExample">
                                        @foreach($ctg as $no => $category)
                                        <div class="card">
                                            <div class="card-heading article-menu">
                                                <a data-toggle="collapse" data-target="#collapse{{ $category->category_id }}">
                                                    {{ $category->category_name }}
                                                </a>
                                            </div>
                                            <div id="collapse{{ $category->category_id }}" class="collapse" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    @php
                                                        $cat = DB::table('tb_article_category')
                                                            ->join('tb_article','tb_article_category.category_id','=','tb_article.category_id')
                                                            ->where('tb_article_category.category_id', $category->category_id)
                                                            ->get();
                                                    @endphp
                                                    @foreach($cat as $no => $article)
                                                        <a href="{{ route('blog', $article->article_id) }}">
                                                            <p>{{ $article->article_judul }}</p>
                                                        </a>
                                                        <hr>
                                                    @endforeach
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
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

@endsection