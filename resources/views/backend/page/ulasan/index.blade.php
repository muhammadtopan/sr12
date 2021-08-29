@extends ('backend/layouts.app')
@section ('title', 'Ulasan')

@section ('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ulasan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Ulasan</li>
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
                    <div class="card card-dark card-outline">
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                <strong>{{ session()->get('message') }}</strong>
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                            </div>
                        @endif
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="zero-config" class="table table-bordered table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Ulasan</th>
                                            <th>Email</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($ulasan as $no => $ulas)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $ulas->ulasan }}</td>
                                            <td>{{ $ulas->email }}</td>
                                            <td><?php  
                                                    $tanggal = $ulas->created_at; 
                                                    $tgl = explode(" ", $tanggal); 
                                                ?> 
                                                {{ $tgl[0]  }}
                                            </td>
                                            <td>
                                                <label class="switch">
                                                    <input
                                                        type="checkbox"
                                                        value="{{ $ulas->ulasan_status }}"
                                                        onchange="cekStatus(<?= $ulas->ulasan_id ?>, this)"
                                                        <?php echo ($ulas->ulasan_status == 'on') ? "checked" : "" ?> >
                                                    <span class="slider round"></span>
                                                </label>
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

    <script>

    function cekStatus(ulasan_id, ceklis) {
        if (ceklis.checked) {
            // alert("ceklis Dihidupkan")
            axios.post("{{route('ulasan.active')}}", {
                'id': ulasan_id,
            }).then(function(res) {
                console.log(res.data.message)
                toastr.info(res.data.message)
            }).catch(function(err) {
                console.log(err);
            })
        } else {
            // alert("Ceklis dimatikan")
            axios.post("{{route('ulasan.non_active')}}", {
                'id': ulasan_id,
            }).then(function(res) {
                // console.log(res.data.message)
                toastr.warning(res.data.message)
            }).catch(function(err) {
                console.log(err);
            })
        }
    }

</script>
@endsection
