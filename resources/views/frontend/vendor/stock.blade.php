@extends ('backend/layouts.app')
@section ('title', 'Vendor List')

@section ('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Stock Product</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Stock Product</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-tabs">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            <strong>{{ session()->get('message') }}</strong>
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                        </div>
                    @endif
                    <div class="card-header bg-dark p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="verifikasi-tab" data-toggle="pill" href="#verifikasi" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Stock</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="belum-verifikasi-tab" data-toggle="pill" href="#belum-verifikasi" role="tab" aria-controls="belum-verifikasi" aria-selected="false">Stock Kosong</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-two-tabContent">

                            {{-- Stock > 0 --}}
                            <div class="tab-pane fade show active" id="verifikasi" role="tabpanel" aria-labelledby="verifikasi-tab">
                                <table id="zero_config" class="table table-bordered table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Product</th>
                                            <th>Stock</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($product as $no => $stocks)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-center">
                                                <!-- <img src="{{ asset('lte/dist/img/product/' . $stocks->product_image )}}" alt="homepage" class="light-logo" style="width: 10em;"> <br> -->
                                                {{ $stocks->product_name }}
                                            </td>
                                            <td class="text-center">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <input type="number" min="0" class="form-control" name="stock_input{{ $stocks->product_id }}" id="stock_input{{ $stocks->product_id }}" value="{{ $stocks->product_stok }}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <button data-input="{{$stocks->product_id}}" class="btn btn-sm btn-dark my-4" onclick="update_stok(this, '{{$stocks->stok_id}}','{{ route("stock.update") }}', '{{$stocks->product_id}}')">
                                                    <i class="fa fa-edit .text-white" style="color: #fff !important"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {{-- Stock = 0 --}}
                            <div class="tab-pane fade" id="belum-verifikasi" role="tabpanel" aria-labelledby="belum-verifikasi-tab">
                                <table id="zero_config" class="table table-bordered table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Product</th>
                                            <th>Stock</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($stok0 as $nomor => $stoksnull)
                                        {{-- {{dd($stoksnull)}} --}}
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-center">
                                                <!-- <img src="{{ asset('lte/dist/img/product/' . $stoksnull->product_image )}}" alt="homepage" class="light-logo" style="width: 10em;"> <br> -->
                                                {{ $stoksnull->product_name }}
                                            </td>
                                            <td class="text-center">
                                            <div class="col-3">
                                                    <div class="form-group">
                                                        <input type="number" min="0" class="form-control" name="stock_input{{ $stoksnull->product_id }}" id="stock_input{{ $stoksnull->stok_id }}" value="{{ $stoksnull->product_stok }}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <button data-input="{{$stoksnull->stok_id}}" class="btn btn-sm btn-dark my-4" onclick="update_stok(this, '{{$stoksnull->stok_id}}','{{ route("stock.update") }}', '{{$stoksnull->product_id}}')">
                                                    <i class="fa fa-edit .text-white" style="color: #fff !important"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

<script>
    async function update_stok(e,stok_id,route) {
        // console.log(stok_id);
        var stock_value = document.getElementById(`stock_input${e.dataset.input}`).value;
        console.log(stock_value);
        let data = await axios.post("{{ route('stock.update') }}",{stock_id: stok_id, product_stok: stock_value})
        toastr.success(data.data.message)
}
</script>
@endsection
