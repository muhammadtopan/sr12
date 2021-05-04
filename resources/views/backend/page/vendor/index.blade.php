@extends ('backend/layouts.app')
@section ('title', 'Vendor List')

@section ('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Vendor</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Vendor</li>
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
                <div class="card">
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        <strong>{{ session()->get('message') }}</strong>
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                    </div>
                    @endif
                    <div class="card-header">
                        <h3 class="card-title">List Vendor</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- <button onclick="modal_tambah('{{route("vendor.store")}}', 'tambah')" class="btn btn-lg btn-dark my-4">
                            <i class="fa fa-plus"></i>
                        </button> -->
                        <table id="example2" class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Vendor</th>
                                    <th>Tipe</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vendor as $no => $vendors)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td class="text-center">
                                        {{ $vendors->vendor_name }}
                                    </td>
                                    <td>
                                        <label class="switch">
                                            <input 
                                                type="checkbox" 
                                                class="cek_status" 
                                                id="cek_status" 
                                                value="{{ $products->product_status }}" 
                                                onchange="cekStatus(<?= $products->product_id ?>, this)" 
                                                <?php echo ($products->product_status == 'on') ? "checked" : "" ?> >
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" onclick="modal_tambah('{{ route("product.store") }}', '{{ $products->product_id  }}')"><i class="fa fa-edit .text-white" style="color: #fff !important"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="modal_hapus('{{ route("product.delete", $products->product_id) }}')"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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

<div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Input Product Baru</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @php
                    $product = DB::table('tb_product')->first();
                @endphp
                <form action="" method="POST" enctype="multipart/form-data" id="formproduct">
                    @csrf
                    <input type="hidden" name="product_id" id="product_id">
                    <div class="form-group">
                        <label for="category_id">Kategori</label>
                        <select name="category_id" id="category_id" class="form-control @error('category_id') {{ 'is-invalid' }} @enderror">
                            <option value="">-Kategori-</option>
                            @foreach($category as $no => $category)
                                <option value="{{ $category->category_id }}">
                                    {{ $category->category_name}}
                                </option>
                            @endforeach
                        </select>
                        @if(isset($category))
                        <script>
                            document.getElementById('category_id').value =
                                '<?php echo $category->category_id ?>'
                        </script>
                        @endif
                        @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="product_name">Nama Produk</label>
                        <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Nama Produk" value="{{ old('product_name') ?? $product->product_name ?? '' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="product_bpom">BPOM Produk</label>
                        <input type="number" class="form-control" name="product_bpom" id="product_bpom" placeholder="BPOM Produk" value="{{ old('product_bpom') ?? $product->product_bpom ?? '' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="product_netto">Netto</label>
                        <input type="number" class="form-control" name="product_netto" id="product_netto" placeholder="Netto" value="{{ old('product_netto') ?? $product->product_netto ?? '' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="product_weight">Berat</label>
                        <input type="number" class="form-control" name="product_weight" id="product_weight" placeholder="Berat Produk" value="{{ old('product_weight') ?? $product->product_weight ?? '' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="product_unit">Satuan Produk</label>
                        <select name="product_unit" id="product_unit" class="form-control @error('product_unit') {{ 'is-invalid' }} @enderror">
                            <option value="mg">mili gram</option>
                            <option value="g" selected>gram</option>
                            <option value="ml">mili liter</option>
                            <option value="l">liter</option>
                        </select>
                        @if(isset($product))
                        <script>
                            document.getElementById('product_unit').value =
                                '<?php echo $product->product_unit ?>'
                        </script>
                        @endif
                        @error('product_unit')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="summernote">Keterangan Produk</label>
                        <textarea id="summernote" class="form-control" name="product_desk" value="{{ old('product_desk') ?? $product->product_desk ?? '' }}"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="product_image">Foto Produk</label>
                        <input type="file" class="form-control" name="product_image" id="product_image">
                    </div>
                    <div class="form-group">
                        <label for="product_price">Produk Harga</label>
                        <input type="number" class="form-control" name="product_price" id="product_price" placeholder="Harga Produk" value="{{ old('product_price') ?? $product->product_price ?? '' }}" required>
                    </div>
                    <div class="row text-right" style="margin-right: 2px">
                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" id="formDelete">
                <div class="modal-body">
                    @csrf
                    @method('delete')
                    Yakin Hapus Data ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

    function cekStatus(product_id, ceklis) {
        if (ceklis.checked) {
            // alert("ceklis Dihidupkan")
            axios.post("{{route('product.active')}}", {
                'id': product_id,
            }).then(function(res) {
                console.log(res.data.message)
                toastr.info(res.data.message)
            }).catch(function(err) {
                console.log(err);
            })
        } else {
            // alert("Ceklis dimatikan")
            axios.post("{{route('product.non_active')}}", {
                'id': product_id,
            }).then(function(res) {
                // console.log(res.data.message)
                toastr.warning(res.data.message)
            }).catch(function(err) {
                console.log(err);
            })
        }
    }

    function modal_tambah(url, aksi) {
        if (aksi != 'tambah') {
            // ambil data dari axios
            axios.post("{{ route('cari_data_product') }}", {
                'product_id': aksi,
            }).then(function(res) {
                var product = res.data;
                console.log(product)
                $('#product_id').val(product.product_id);
                $('#category_id').val(product.category_id);
                $('#product_name').val(product.product_name);
                $('#product_bpom').val(product.product_bpom);
                $('#product_netto').val(product.product_netto);
                $('#product_weight').val(product.product_weight);
                $('#product_unit').val(product.product_unit);
                $('#summernote').val(product.product_desk);
                $('#product_price').val(product.product_price);
                $('#product_image').attr('required', false);
                // $('#kategori_id').val(product.kategori_id).change();
            }).catch(function(err) {
                console.log(err)
            })
        } else {
            $('#product_id').val('');
            $('#category_id').val('');
            $('#product_name').val('');
            $('#product_bpom').val('');
            $('#product_netto').val('');
            $('#product_weight').val('');
            $('#product_unit').val('');
            $('#summernote').val('');
            $('#product_price').val('');
            $('#product_image').val('');
            $('#product_image').attr('required', true);
        }
        $('#formproduct').attr('action', url);
        $('#ModalTambah').modal('show');
    }

    // untuk hapus data
    function modal_hapus(url) {
        $('#ModalHapus').modal()
        $('#formDelete').attr('action', url);
    }
</script>

@endsection