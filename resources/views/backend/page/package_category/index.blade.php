@extends ('backend/layouts.app')
@section ('title', 'Category')

@section ('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kategori Paket</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Kategori Paket</li>
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
                        <h3 class="card-title">List Kategori</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <button onclick="modal_tambah('{{route('package_category.store')}}', 'tambah')" class="btn btn-lg btn-dark my-4" data-toggle="modal" data-target="#ModalTambah">
                            <i class="fa fa-plus"></i>
                        </button>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Kategori Barang</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($category as $no => $categories)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $categories->package_category_name }}</td>
                                    <td>
                                        <img src="{{ asset('lte/dist/img/package_category/' . $categories->package_category_image )}}" alt="homepage" class="light-logo" style="width: 10em;">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm"
                                        data-toggle="modal" data-target="#ModalTambah"
                                        onclick="modal_tambah('{{ route('package_category.store') }}', '{{ $categories->package_category_id  }}')"><i class="fa fa-edit .text-white" style="color: #fff !important"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm"
                                        data-toggle="modal" data-target="#ModalHapus"
                                        onclick="modal_hapus('{{ route('package_category.delete', $categories->package_category_id) }}')"><i class="fa fa-trash"></i></button>
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
                    <h4 class="modal-title">Input Kategori Produk Baru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @php
                        $category = DB::table('tb_package_category')
                                    ->first();
                    @endphp
                    <form action="" method="POST" enctype="multipart/form-data" id="formCategory">
                        @csrf
                        <input type="hidden" name="package_category_id" id="package_category_id">
                        <div class="form-group">
                            <label for="category_opp_id">Kategori</label>
                            <select name="category_opp_id" id="category_opp_id" class="form-control @error('category_opp_id') {{ 'is-invalid' }} @enderror">
                                <option value="">-Kategori-</option>
                                @foreach($category_opp as $no => $ctr_opp)
                                    <option value="{{ $ctr_opp->category_opp_id }}">
                                        {{ $ctr_opp->category_opp_name}}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_opp_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="package_category_name">Nama Kategori</label>
                            <input type="text" class="form-control" name="package_category_name" id="package_category_name" placeholder="Nama Kategori" value="{{ old('package_category_name') ?? $category->package_category_name ?? '' }}" required>
                        </div>
                        <label for="package_category_name">List Product</label>
                        <div class="row">
                            @foreach($product as $no => $products)
                                <div class="col-sm-3">
                                    <!-- checkbox -->
                                    <div class="form-group clearfix">
                                        <div class="icheck-success d-inline">
                                            <input type="checkbox" name="product[{{ $products->product_id }}]" id="{{ $products->product_id }}">
                                            <label for="{{ $products->product_id }}">
                                            {{ $products->product_name }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label for="summernote">Cara Pakai</label>
                            <textarea id="summernote" class="form-control" name="package_category_step"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="package_category_image">Foto Paket</label>
                            <input type="file" class="form-control" name="package_category_image" id="package_category_image">
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
        function modal_tambah(url, aksi){
            if(aksi != 'tambah'){
                // ambil data dari axios
                axios.post("{{ route('cari_kategori_paket') }}", {
                    'package_category_id': aksi,
                }).then(function(res) {
                    var package_category = res.data.produk;
                    var package_category_detail = res.data.detail;

                    $('#package_category_id').val(package_category.package_category_id);
                    $('#package_category_name').val(package_category.package_category_name);
                    $('#summernote').summernote('code', package_category.package_category_step);
                    $('#package_category_image').attr('required', false);
                    $('#summernote').summernote('code', package_category_detail.package_category_step);

                    // ceklis barang

                    var a = [];
                    for(var i in package_category_detail){
                        if(package_category_detail.hasOwnProperty(i)){
                            a.push(i);
                        }
                    }

                    // var b = a.toString()
                    // var cek = b.split(",");
                    // var list_gender = document.getElementsByName("id_gender2");
                    // // reset centang gender
                    // for (var x = 0; x < list_gender.length; x++) {
                    //     list_gender[x].checked = false;
                    // }
                    // for (var x = 0; x < list_gender.length; x++) {
                    //     for (var i = 0; i < cek.length; i++) {
                    //         if (list_gender[x].value == cek[i]) {
                    //             list_gender[x].checked = true;
                    //         }
                    //     }
                    // }

                    $('#kategori_id').val(package_category.kategori_id).change();
                }).catch(function(err) {
                    // console.log(err)
                })
            }else{
                $('#package_category_name').val('');
                $('#summernote').summernote('code','');
                $('#package_category_image').val('');
                $('#package_category_image').attr('required', true);
            }
            $('#formCategory').attr('action', url);
        }

        // untuk hapus data
        function modal_hapus(url) {
            $('#ModalHapus').modal()
            $('#formDelete').attr('action', url);
        }
    </script>
@endsection
