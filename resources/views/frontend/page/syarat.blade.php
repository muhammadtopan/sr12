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

    <section id="syarat" data-spy="scroll" data-target="#navbar-example3">
        <div class="row">
            <div class="col-md-4">
                <nav id="navbar-example3" class="navbar navbar-light bg-light">
                <!-- <a class="navbar-brand" href="#">MITRA RESMI SR12 HERBAL SKINCARE</a> -->
                    <nav class="nav nav-pills flex-column">
                        <a class="nav-link" href="#item-1">Item 1</a>
                        <nav class="nav nav-pills flex-column">
                            <a class="nav-link ml-3 my-1" href="#item-1-1">Item 1-1</a>
                            <a class="nav-link ml-3 my-1" href="#item-1-2">Item 1-2</a>
                        </nav>
                        <a class="nav-link" href="#item-2">Item2</a>
                        <a class="nav-link" href="#item-3">Item3</a>
                        <nav class="nav nav-pills flex-column">
                            <a class="nav-link ml-3 my-1" href="#item-3-1">Item 3-1</a>
                            <a class="nav-link ml-3 my-1" href="#item-3-2">Item 3-2</a>
                        </nav>
                    </nav>
                </nav>
            </div>
            <div class="col-md-2">
                <div data-spy="scroll" data-target="#navbar-example3" data-offset="0">
                    <h4 id="item-1">Item 1</h4>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis, vero ipsa. Hic doloribus aperiam perferendis incidunt quis quae eveniet iure ex neque! Inventore, soluta? Labore natus commodi aliquid perferendis fugiat!</p>
                    <h5 id="item-1-1">Item 1-1</h5>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis, vero ipsa. Hic doloribus aperiam perferendis incidunt quis quae eveniet iure ex neque! Inventore, soluta? Labore natus commodi aliquid perferendis fugiat!</p>
                    <h5 id="item-1-2">Item 2-2</h5>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis, vero ipsa. Hic doloribus aperiam perferendis incidunt quis quae eveniet iure ex neque! Inventore, soluta? Labore natus commodi aliquid perferendis fugiat!</p>
                    <h4 id="item-2">Item 2</h4>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis, vero ipsa. Hic doloribus aperiam perferendis incidunt quis quae eveniet iure ex neque! Inventore, soluta? Labore natus commodi aliquid perferendis fugiat!</p>
                    <h4 id="item-3">Item 3</h4>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis, vero ipsa. Hic doloribus aperiam perferendis incidunt quis quae eveniet iure ex neque! Inventore, soluta? Labore natus commodi aliquid perferendis fugiat!</p>
                    <h5 id="item-3-1">Item 3-1</h5>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis, vero ipsa. Hic doloribus aperiam perferendis incidunt quis quae eveniet iure ex neque! Inventore, soluta? Labore natus commodi aliquid perferendis fugiat!</p>
                    <h5 id="item-3-2">Item 3-2</h5>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis, vero ipsa. Hic doloribus aperiam perferendis incidunt quis quae eveniet iure ex neque! Inventore, soluta? Labore natus commodi aliquid perferendis fugiat!</p>
                </div>
            </div>
        </div>
    </section>

@endsection