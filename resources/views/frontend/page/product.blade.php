@extends ('frontend/layout.app')
@section ('title', 'Herbal Skincare')

@section ('content')

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Product</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                    <div class="filter-widget">
                        <h4 class="fw-title">Kategori Produk</h4>
                        <div class="fw-brand-check">
                            @foreach($category as $no => $ctglist)
                                <div class="bc-item">
                                    <label>
                                        {{ $ctglist->category_name }}
                                        <input type="checkbox" id="ctglist" value="{{$ctglist->category_id}}">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Paket Product</h4>
                        <ul class="filter-catagories">
                            @foreach($package as $no => $packagelist)
                                <li><a href="{{ url('filter/packages/'. $packagelist->package_category_id)}}">{{ $packagelist->package_category_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Harga</h4>
                        <div class="filter-range-wrap">
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                            <div id="slider-filter" onmouseup="sliderFilter(this)" class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="0" data-max="500000">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <div class="select-option">
                                    <select class="sorting" id="sorting" onchange="filterSorting(this)">
                                        <option id="acak" value="acak">Acak</option>
                                        <option id="terendah" value="harga-terendah">Harga Terendah</option>
                                        <option id="tertinggi" value="harga-tertinggi">Harga Tertinggi</option>
                                        <option id="product-terbaru" value="product_terbaru">Product Terbaru</option>
                                        <option id="best-seller" value="best-seller">Best Seller</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-list">
                        <div class="row" id="pr-container">
                            @forelse($product as $no => $pdklist)
                                <div class="col-lg-3 col-sm-4">
                                    <div class="product-item">
                                        <div class="pi-pic">
                                            <a href="{{ route('detail_product',$pdklist->product_id)}}">
                                                <img src="{{ asset('lte/dist/img/product/' . $pdklist->product_image )}}" alt="">
                                            </a>
                                            <ul>
                                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                                <!-- <li class="quick-view"><a href="#">+ Quick View</a></li>
                                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li> -->
                                            </ul>
                                        </div>
                                        <div class="pi-text">
                                            <div class="catagory-name">{{ $pdklist->category_name }}</div>
                                            <a href="#">
                                                <h5>{{ $pdklist->product_name }}</h5>
                                            </a>
                                            <div class="product-price">
                                                Rp {{ number_format($pdklist->product_price) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-lg-12">
                                    <h4 class="text-center">Oppss... Barang yang kamu cari  tidak ada, silahkan menggunakan kata kunci yang lain</h4>
                                </div>
                                <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_CWcCII.json"  background="transparent"  speed="1"  style="width: 100%; height: 100%;"  loop  autoplay></lottie-player>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <script>
        let list = Array.from(document.querySelectorAll("#ctglist"))
        let container = document.getElementById("pr-container")
        let listId = [];
        let filter = null
        let min = null
        let max = null

        addEventListener("DOMContentLoaded", (e) => {
            localStorage.setItem("oldPR", container.innerHTML)
            let params = window.location.pathname.split("/")[3]
            let data = {
                value: "product_terbaru"
            }
            filterSorting(data);
        })

        // Filter Checkbox
            function filterIndex(index, id) {
                if(index >= 0) {
                    listId = listId.filter(l => {
                        return l !== id
                    })
                } else {
                    listId.push(id)
                }
            }

            function updateUI(data) {
                let product = "";
                data.forEach(d => {
                            product += `
                            <div class="col-lg-3 col-sm-4">
                                        <div class="product-item">
                                            <div class="pi-pic">
                                                <a href="http://{{env("APP_URL")}}:8000/detail-product/${d.product_id}">
                                                    <img src='{{env("APP_URL")}}:8000/lte/dist/img/product/${d.product_image}' alt="">
                                                </a>
                                                <ul>
                                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                                    <!-- <li class="quick-view"><a href="#">+ Quick View</a></li>
                                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li> -->
                                                </ul>
                                            </div>
                                            <div class="pi-text">
                                                <div class="catagory-name"> ${d.category_name}</div>
                                                <a href="#">
                                                    <h5> ${d.product_name} </h5>
                                                </a>
                                                <div class="product-price">
                                                    Rp.${new Intl.NumberFormat().format(d.product_price)}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            `
                })
                return product
            }

            function loopingUpdate(data) {
                let newData = [];
                data.forEach(d => {
                    newData = [...newData,...d]
                })
                let product = updateUI(newData)
                container.innerHTML = product
            }

            function reset() {
                container.innerHTML = localStorage.getItem("oldPR")
            }

            list.forEach(l => {
                check = true
                l.addEventListener("click", async (e) => {
                    let id = parseInt(e.target.value)
                    let index = listId.indexOf(id)
                    filterIndex(index, id);
                    let res = null;
                    if(listId.length > 0) {
                        let data = []
                        let res = await axios.get("/api/filter-kategori", {params: {data: listId, filter, min, max}})
                        loopingUpdate(res.data)
                    } else {
                        reset()
                    }
                })
            })
        // Filter Checkbox
        // filter sorting
            async function filterSorting(e) {
                filter = e.value
                let res = await axios.get("/api/filter-sorting", {params: {sort:filter}})
                let ui = updateUI(res.data)
                container.innerHTML = ui
            }
        // filter sorting

        // filter slider
        async function sliderFilter(e) {
            min = document.getElementById("minamount").value.split(" ")[1]
            max = document.getElementById("maxamount").value.split(" ")[1]
            let res = await axios.get('/api/filter-harga', {params: {listId,filter,min,max}})
            if(typeof res.data[0].product_name === "string") {
                container.innerHTML = updateUI(res.data);
            } else {
                loopingUpdate(res.data)
            }
        }
        // filter slider
    </script>

@endsection
