@extends ('layouts/profile-costumer')

@section('content')

    <!-- Content Header (Page header) -->

    <!-- Main content -->

    @if (session("pesan") != null)
        <script>
            alert("{{Session::get('pesan')}}")
        </script>
    @endif

    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12">
                    <div class="info-box card-danger card-outline">
                      <div class="info-box-content">
                        <div class="card-header">
                            <h4 class="card-title">Data Keranjang Berdasarkan Waktu</h4>
                        </div>
                        <div class="card-body">
                            <a href="{{route('user.profile.voucher.history')}}" class="btn btn-danger btn-sm mb-3 text-white"><i class="fas fa-search-plus"></i> Lihat History Saya</a>
                            <div class="table-responsive">
                                <table class="table table-hover" id="zero_config">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Voucher</th>
                                            <th>Point</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($vouchers as $v)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$v->nama_voucher}}</td>
                                                <td>{{$v->jumlah_point}}</td>
                                                <td>
                                                    <a href="{{route("user.profile.voucher.redeem",$v)}}" class="btn btn-primary btn-sm text-white">
                                                        <i class="fas fa-check-circle"></i> Redeem
                                                    </a>
                                                    <a href="#" id="detail_voucher" data-id="{{$v->id}}" class="btn btn-secondary btn-sm text-white" data-toggle="modal" data-target="#exampleModal">
                                                        <i class="fas fa-search-plus"></i> Detail Voucher
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                      </div>

                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
              <i class="fas fa-ticket-alt"></i> Detail Voucher
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <img src="" class="img-thumbnail" id="gambar_voucher" alt="item voucher">
            <div class="form-group">
                <label for="" class="form-label">Nama Voucher</label>
                <input type="text" id="nama_voucher" class="form-control" disabled>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">Item</label>
                        <input type="text" id="item_voucher" class="form-control" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">Point</label>
                        <input type="text" id="point_voucher" class="form-control" disabled>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="form-label">Deskripsi</label>
                <textarea disabled id="deskripsi" cols="30" rows="10" class="form-control"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
  </div>
  @include('frontend.costumer.profile-component.script.voucher_script')
@endsection
