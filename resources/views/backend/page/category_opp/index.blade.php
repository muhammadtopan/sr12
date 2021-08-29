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
                        <h3 class="card-title">Data Kategori Paket</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <button
                        data-toggle="modal" data-target="#ModalTambah"
                        onclick="modal_tambah('{{route('category_opp.store')}}', 'tambah')" class="btn btn-lg btn-dark my-4">
                            <i class="fa fa-plus"></i>
                        </button>
                        <div class="table-responsive">
                            <table id="zero-config" class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori Paket</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($category as $no => $categories)
                                    <tr>
                                        <td>{{ $no + 1 }}</td>
                                        <td>{{ $categories->category_opp_name }}</td>
                                        <td>
                                            <img src="{{ asset('lte/dist/img/category_opp/' . $categories->category_opp_image )}}" alt="homepage" class="light-logo" style="width: 10em;">
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-sm"
                                            data-toggle="modal" data-target="#ModalTambah"
                                            onclick="modal_tambah('{{ route('category_opp.store') }}', '{{ $categories->category_opp_id  }}')"><i class="fa fa-edit .text-white" style="color: #fff !important"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm"
                                            data-toggle="modal" data-target="#ModalHapus"
                                            onclick="modal_hapus('{{ route('category_opp.delete', $categories->category_opp_id) }}')"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            </table>
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

    <div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Kategori Baru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                @php
                    $category_opp = DB::table('tb_category_o_product_package')
                                ->first();
                @endphp
                    <form action="" method="POST" enctype="multipart/form-data" id="formCategory">
                        @csrf
                        <input type="hidden" name="category_opp_id" id="category_opp_id">
                        <div class="form-group">
                            <label for="category_opp_name">Nama Kategori</label>
                            <input type="text" class="form-control" name="category_opp_name" id="category_opp_name" placeholder="Nama Kategori" value="{{ old('category_opp_name') ?? $category_opp->category_opp_name ?? '' }}" required>
                        </div>
                        <div class="form-group">
                            <label for="category_opp_image">Foto Barang</label>
                            <input type="file" class="form-control" name="category_opp_image" id="category_opp_image">
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
                axios.post("{{ route('cari_data_kategori_opp') }}", {
                    'category_opp_id': aksi,
                }).then(function(res) {
                    var category = res.data;
                    console.log(category)
                    $('#category_opp_id').val(category.category_opp_id);
                    $('#category_opp_name').val(category.category_opp_name);
                    $('#category_opp_image').attr('required', false);
                    // $('#kategori_id').val(category.kategori_id).change();
                }).catch(function(err) {
                    // console.log(err)
                })
            }else{
                console.log("bisa");
                $('#category_opp_nama').val('');
                $('#category_opp_image').val('');
                $('#category_opp_image').attr('required', true);
            }
            $('#formCategory').attr('action', url);
            // $('#ModalTambah').modal('show');
        }

        // untuk hapus data
        function modal_hapus(url) {
            $('#ModalHapus').modal()
            $('#formDelete').attr('action', url);
        }
    </script>
@endsection
