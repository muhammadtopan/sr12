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
                                <a class="nav-link active" id="verifikasi-tab" data-toggle="pill" href="#verifikasi" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Sudah Verifikasi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="belum-verifikasi-tab" data-toggle="pill" href="#belum-verifikasi" role="tab" aria-controls="belum-verifikasi" aria-selected="false">Belum Verifikasi</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-two-tabContent">
                            <button class="btn btn-lg btn-dark my-4" onclick="location.reload(true);" style="margin-left: 20px;">
                                <i class="fas fa-redo-alt"></i>
                            </button>
                            <div class="tab-pane fade show active" id="verifikasi" role="tabpanel" aria-labelledby="verifikasi-tab">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Nama Vendor</th>
                                            <th>Level</th>
                                            <th>Kota/Kab</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($vendor as $no => $vendors)
                                        <tr>
                                            <td>{{ $no + 1 }}</td>
                                            <td>
                                                {{ $vendors->username }}
                                            </td>
                                            <td>
                                                {{ $vendors->nama_lengkap }}
                                            </td>
                                            <td>
                                                {{ $vendors->user_level }}
                                            </td>
                                            <td>
                                                {{ $vendors->kota_nama }}
                                            </td>
                                            <td>
                                                <label class="switch">
                                                    <input
                                                        type="checkbox"
                                                        class="cek_status"
                                                        id="cek_status"
                                                        value="{{ $vendors->user_status }}"
                                                        onchange="cekStatus('{{ $vendors->username }}', this)"
                                                        <?php echo ($vendors->user_status == 'on') ? "checked" : "" ?> >
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="belum-verifikasi" role="tabpanel" aria-labelledby="belum-verifikasi-tab">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Nama Vendor</th>
                                            <th>Level</th>
                                            <th>Kota/Kab</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($vendoroff as $nomor => $vendorso)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                {{ $vendorso->username }}
                                            </td>
                                            <td>
                                                {{ $vendorso->nama_lengkap }}
                                            </td>
                                            <td>
                                                {{ $vendorso->user_level }}
                                            </td>
                                            <td>
                                                {{ $vendorso->kota_nama }}
                                            </td>
                                            <td>
                                                <label class="switch">
                                                    <input
                                                        type="checkbox"
                                                        class="cek_status"
                                                        id="cek_status"
                                                        value="{{ $vendorso->user_status }}"
                                                        onchange="cekStatus('{{ $vendorso->username }}', this)"
                                                        <?php echo ($vendorso->user_status == 'on') ? "checked" : "" ?> >
                                                    <span class="slider round"></span>
                                                </label>
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

    function cekStatus(username, ceklis) {
        console.log(username);  
        if (ceklis.checked) {
            axios.post("{{route('data_vendor.active')}}", {
                'username': username,
            }).then(function(res) {
                console.log(res.data.message)
                toastr.info(res.data.message)
            }).catch(function(err) {
                console.log(err);
            })
        } else {
            // alert("Ceklis dimatikan")
            axios.post("{{route('data_vendor.non_active')}}", {
                'username': username,
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
