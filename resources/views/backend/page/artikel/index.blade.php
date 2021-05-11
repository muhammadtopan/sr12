@extends ('backend/layouts.app')
@section ('title', 'Artikel')

@section ('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Artikel</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Artikel</li>
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
                        <h3 class="card-title">Artikel</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <button onclick="modal_tambah('{{route("articel.store")}}', 'tambah')" class="btn btn-lg btn-dark my-4">
                            <i class="fa fa-plus"></i>
                        </button>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Judul Artikel</th>
                                    <th>Gambar</th>
                                    <th>Isi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($artikel as $no => $artikels)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $artikels->articel_judul }}</td>
                                    <td>{!! Str::limit($artikels->articel_isi,400) !!}</td>
                                    <td>
                                        <img src="{{ asset('lte/dist/img/articel/' . $artikels->articel_gambar )}}" alt="homepage" class="light-logo" style="width: 10em;">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" 
                                        onclick="modal_tambah('{{ route("articel.store") }}', '{{ $artikels->articel_id  }}')"><i class="fa fa-edit .text-white" style="color: #fff !important"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" 
                                        onclick="modal_hapus('{{ route('articel.delete', $artikels->articel_id) }}')"><i class="fa fa-trash"></i></button>
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
                    $artikel = DB::table('tb_articel')
                                ->first();
                @endphp
                    <form action="" method="POST" enctype="multipart/form-data" id="formarticel">
                        @csrf
                        <input type="hidden" name="articel_id" id="articel_id">
                        <div class="form-group">
                            <label for="articel_judul">Judul Artikel</label>
                            <input type="text" class="form-control" name="articel_judul" id="articel_judul" placeholder="Judul Artikel" value="{{ old('articel_judul') ?? $artikel->articel_judul ?? '' }}" required>
                        </div>
                        <div class="form-group col-4">
                            <label for="articel_tanggal">Tanggal</label>
                            <input type="date" class="form-control" name="articel_tanggal" id="articel_tanggal" value="{{ old('articel_tanggal') ?? $artikel->articel_tanggal ?? '' }}" required>
                        </div>
                        <div class="form-group">
                            <label for="articel_penulis">Judul Artikel</label>
                            <input type="text" class="form-control" name="articel_penulis" id="articel_penulis" placeholder="Nama Penulis" value="{{ old('articel_penulis') ?? $artikel->articel_penulis ?? '' }}" required>
                        </div>
                        <div class="form-group">
                            <label for="summernote">Isi Artikel</label>
                            <textarea id="summernote" class="form-control" name="articel_isi" value="{{ old('articel_isi') ?? $artikel->articel_isi ?? '' }}"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="articel_gambar">Foto Barang</label>
                            <input type="file" class="form-control" name="articel_gambar" id="articel_gambar">
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
                axios.post("{{ route('cari_data_articel') }}", {
                    'articel_id': aksi,
                }).then(function(res) {
                    var artikel = res.data;
                    console.log(artikel)
                    $('#articel_id').val(artikel.articel_id);
                    $('#articel_judul').val(artikel.articel_judul);
                    $('#articel_tanggal').val(artikel.articel_tanggal);
                    $('#articel_penulis').val(artikel.articel_penulis);
                    $('#articel_isi').val(artikel.articel_isi);
                    $('#articel_gambar').attr('required', false);
                    // $('#kategori_id').val(artikel.kategori_id).change();
                }).catch(function(err) {
                    // console.log(err)
                })
            }else{
                $('#articel_judul').val('');
                $('#articel_tanggal').val('');
                $('#articel_penulis').val('');
                $('#articel_isi').val('');
                $('#articel_gambar').val('');
                $('#articel_gambar').attr('required', true);
            }
            $('#formarticel').attr('action', url);
            $('#ModalTambah').modal('show');
        }

        // untuk hapus data
        function modal_hapus(url) {
            $('#ModalHapus').modal()
            $('#formDelete').attr('action', url);
        }
    </script>
@endsection