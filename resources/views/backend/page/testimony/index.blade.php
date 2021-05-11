@extends ('backend/layouts.app')
@section ('title', 'Testimoni')

@section ('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Testimoni</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Testimoni</li>
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
                        <h3 class="card-title">Testimoni</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <button onclick="modal_tambah('{{route("testimony.store")}}', 'tambah')" class="btn btn-lg btn-dark my-4">
                            <i class="fa fa-plus"></i>
                        </button>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Judul Testimoni</th>
                                    <th>Gambar</th>
                                    <th>Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($testimony as $no => $testimoni)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $testimoni->testimony_judul }}</td>
                                    <td>
                                        <img src="{{ asset('lte/dist/img/testimony/' . $testimoni->testimony_gambar )}}" alt="homepage" class="light-logo" style="width: 10em;">
                                    </td>
                                    <td>
                                        <input type="radio" id="id{{ $testimoni->testimony_id }}" name="name{{ $testimoni->testimony_id }}" value="product" onclick="cekProduct(<?= $testimoni->testimony_id ?>, this)" <?php echo ($testimoni->testimony_category == 'product') ? "checked" : "" ?>>Product<br>
                                        <input type="radio" id="id{{ $testimoni->testimony_id }}" name="name{{ $testimoni->testimony_id }}" value="consument" onclick="cekConsument(<?= $testimoni->testimony_id ?>, this)" <?php echo ($testimoni->testimony_category == 'consument') ? "checked" : "" ?>>Konsumen<br>
                                    </td>
                                    <td>
                                        <!-- <button type="button" class="btn btn-warning btn-sm" 
                                        onclick="modal_tambah('{{ route("testimony.store") }}', '{{ $testimoni->testimony_id  }}')"><i class="fa fa-edit .text-white" style="color: #fff !important"></i></button> -->
                                        <button type="button" class="btn btn-danger btn-sm" 
                                        onclick="modal_hapus('{{ route('testimony.delete', $testimoni->testimony_id) }}')"><i class="fa fa-trash"></i></button>
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
                    $test = DB::table('tb_testimony')
                                ->first();
                @endphp
                    <form action="" method="POST" enctype="multipart/form-data" id="formtesti">
                        @csrf
                        <input type="hidden" name="testimony_id" id="testimony_id">
                        <div class="form-group">
                            <label for="testimony_judul">Judul Testimoni</label>
                            <input type="text" class="form-control" name="testimony_judul" id="testimony_judul" placeholder="Judul Testimoni" value="{{ old('testimony_judul') ?? $test->testimony_judul ?? '' }}" required>
                        </div>
                        <div class="form-group">
                            <label for="testimony_gambar">Foto Barang</label>
                            <input type="file" class="form-control" name="testimony_gambar" id="testimony_gambar">
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
        function cekProduct(testimony_id, ceklis) {
            if (ceklis.checked) {
                // alert("ceklis Dihidupkan")
                axios.post("{{route('testimony.product')}}", {
                    'id': testimony_id,
                }).then(function(res) {
                    // console.log(res.data.message)
                    toastr.success(res.data.message)
                }).catch(function(err) {
                    console.log(err);
                })
            } else {

            }
        }
        
        function cekConsument(testimony_id, ceklis) {
            if (ceklis.checked) {
                // alert("ceklis Dihidupkan")
                axios.post("{{route('testimony.consument')}}", {
                    'id': testimony_id,
                }).then(function(res) {
                    // console.log(res.data.message)
                    toastr.success(res.data.message)
                }).catch(function(err) {
                    console.log(err);
                })
            } else {

            }
        }

        function modal_tambah(url, aksi){ 
            if(aksi != 'tambah'){
                // ambil data dari axios
                axios.post("{{ route('cari_data_testimony') }}", {
                    'testimony_id': aksi,
                }).then(function(res) {
                    var tastimony = res.data;
                    console.log(tastimony)
                    $('#testimony_id').val(tastimony.testimony_id);
                    $('#testimony_judul').val(tastimony.testimony_judul);
                    $('#testimony_gambar').attr('required', false);
                    // $('#kategori_id').val(tastimony.kategori_id).change();
                }).catch(function(err) {
                    // console.log(err)
                })
            }else{
                $('#testimony_judul').val('');
                $('#testimony_gambar').val('');
                $('#testimony_gambar').attr('required', true);
            }
            $('#formtesti').attr('action', url);
            $('#ModalTambah').modal('show');
        }

        // untuk hapus data
        function modal_hapus(url) {
            $('#ModalHapus').modal()
            $('#formDelete').attr('action', url);
        }
    </script>
@endsection