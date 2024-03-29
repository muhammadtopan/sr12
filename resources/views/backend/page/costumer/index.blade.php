@extends ('backend/layouts.app')
@section ('title', 'Data Costumer')

@section ('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Costumer</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Costumer</li>
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
                                            <th>Nama Costumer</th>
                                            <th>Nomor HP</th>
                                            <th>Freelance</th>
                                            <th>Alamat</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($costumer as $no => $ctm)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $ctm->costumer_name }}</td>
                                            <td>{{ $ctm->costumer_phone }}</td>
                                            <td>{{ $ctm->referal == null ? "Tanpa Freelance" : $ctm->username }}</td>
                                            <td>{{ $ctm->costumer_address }}</td>
                                            <td class="text-center">
                                                <a href="#" data-toggle="modal" onclick="rincianCostumer('{{ $ctm->costumer_id }}')" data-target="#exampleModal"><i class="fas fa-eye"></i></a>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rincian Costumer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" id="costumer_name" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Email </label>
                            <input type="text" class="form-control" id="costumer_email" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nomor Telfon</label>
                            <input type="text" class="form-control" id="costumer_phone" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tanggal Lahir </label>
                            <input type="text" class="form-control" id="costumer_ttl" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Jenis Kelamin </label>
                            <input type="text" class="form-control" id="costumer_gender" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Kota</label>
                            <input type="text" class="form-control" id="kota_id" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Provinsi</label>
                            <input type="text" class="form-control" id="prov_id" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" class="form-control" id="costumer_address" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Poin</label>
                            <input type="text" class="form-control" id="point" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Freelance</label>
                            <input type="text" class="form-control" id="referal" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function rincianCostumer(e) {  
        console.log(e);
        axios.post("{{route('detailCostumer')}}",{
            'costumer_id' : e 
        }).then(function(res) {
            let costumer = res.data;
            console.log(costumer);
            $('#costumer_name').val(costumer.costumer_name);
            $('#costumer_email').val(costumer.costumer_email);
            $('#costumer_phone').val(costumer.costumer_phone);
            $('#costumer_ttl').val(costumer.costumer_ttl);
            if (costumer.costumer_gender != 'LK') {
                $('#costumer_gender').val("Perempuan");
            }else{
                $('#costumer_gender').val("Laki - Laki");
            }
            $('#prov_id').val(costumer.prov_nama);
            $('#kota_id').val(costumer.kota_nama);
            $('#costumer_address').val(costumer.costumer_address);
            $('#point').val(costumer.point);
            if (costumer.referal != null) {
                $('#referal').val(costumer.username);
            }else{
                $('#referal').val("Tidak ada Freelance");
            }
        }).catch(function(err) {
            console.log(err);
        })
    }
</script>

@endsection