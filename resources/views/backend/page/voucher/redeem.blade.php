@extends ('backend/layouts.app')
@section ('title', 'Dashboard')

@section ('content')
    @if (session("pesan") != null)
        <script>
            alert("{{session('pesan')}}")
        </script>
    @endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">DataTables</li>
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
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-ticket-alt"></i> Daftar Voucher Yang Berlaku Saat Ini</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="zero_config" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Costumer</th>
                                <th>Nama Voucher</th>
                                <th>Item</th>
                                <th>Jumlah Point</th>
                                <th>Status</th>
                                <th>Tanggal Redeem</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($redeem as $r)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$r->costumer_name}}</td>
                                    <td>{{$r->nama_voucher}}</td>
                                    <td>{{$r->item}}</td>
                                    <td>{{$r->jumlah_point}}</td>
                                    <td>
                                        @if ($r->status == "belum konfirmasi")
                                            <span class="text-danger" style="text-transform: capitalize">{{$r->status}}</span>
                                        @else
                                            <span class="text-success" style="text-transform: capitalize">{{$r->status}}</span>
                                        @endif
                                    </td>
                                    <td>{{$r->created_at->format("d-M-Y")}}</td>
                                    <td>
                                        @if ($r->status != "konfirmasi")
                                            <a href="{{route("voucher.redeem.konfirmasi", $r)}}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-check"></i> Konfirmasi
                                            </a>
                                        @else
                                            <a href="{{route("voucher.redeem.konfirmasi", $r)}}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-check"></i> Batalkan Konfirmasi
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nama Costumer</th>
                                <th>Nama Voucher</th>
                                <th>Item</th>
                                <th>Jumlah Point</th>
                                <th>Status</th>
                                <th>Tanggal Redeem</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
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
@endsection
