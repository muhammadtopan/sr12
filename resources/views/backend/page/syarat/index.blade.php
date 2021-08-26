@extends ('backend/layouts.app')
@section ('title', 'Syarat')

@section ('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Syarat</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Syarat</li>
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
                        <h3 class="card-title">Syarat</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <button onclick="modal_tambah('{{route("syarat.store")}}', 'tambah')" class="btn btn-lg btn-dark my-4">
                            <i class="fa fa-plus"></i>
                        </button>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Isi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($syarat as $no => $syarats)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $syarats->syarat_judul }}</td>
                                    <td>{!! Str::limit($syarats->syarat,400) !!}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" 
                                        onclick="modal_tambah('{{ route("syarat.store") }}', '{{ $syarats->syarat_id  }}')"><i class="fa fa-edit .text-white" style="color: #fff !important"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" 
                                        onclick="modal_hapus('{{ route('syarat.delete', $syarats->syarat_id) }}')"><i class="fa fa-trash"></i></button>
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
                    <h4 class="modal-title">Form Syarat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                @php
                    $syarat = DB::table('tb_syarat')
                                ->first();
                @endphp
                    <form action="" method="POST" enctype="multipart/form-data" id="formsyarat">
                        @csrf
                        <input type="hidden" name="syarat_id" id="syarat_id">
                        <div class="form-group">
                            <label for="syarat_judul">Judul</label>
                            <input type="text" class="form-control" name="syarat_judul" id="syarat_judul" placeholder="Judul" value="{{ old('syarat_judul') ?? $syarat->syarat_judul ?? '' }}" required>
                        </div>
                        <div class="form-group">
                            <label for="syarat">Isi</label>
                            <textarea id="summernote" class="form-control" name="syarat"></textarea>
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
                axios.post("{{ route('cari_data_syarat') }}", {
                    'syarat_id': aksi,
                }).then(function(res) {
                    var syarat = res.data;
                    console.log(syarat)
                    $('#syarat_id').val(syarat.syarat_id);
                    $('#syarat_judul').val(syarat.syarat_judul);
                    $('#summernote').summernote("code", syarat.syarat);
                    // $('#kategori_id').val(syarat.kategori_id).change();
                }).catch(function(err) {
                    // console.log(err)
                }) 
            }else{
                $('#syarat_judul').val('');
                $('#syarat').val('');
            }
            $('#formsyarat').attr('action', url);
            $('#ModalTambah').modal('show');
        }

        // untuk hapus data
        function modal_hapus(url) {
            $('#ModalHapus').modal()
            $('#formDelete').attr('action', url);
        }
    </script>
@endsection