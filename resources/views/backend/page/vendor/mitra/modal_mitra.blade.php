
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="">
            <div class="modal-body">
                <div class="form-group">
                    <label for="" class="form-label">Nama Mitra</label>
                    <input type="text" name="nama_gudang"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">No.Wa</label>
                    <input type="number" name="no_wa" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Email</label>
                    <input type="email" name="email" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Password</label>
                    <input type="password" name="password" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">NIK</label>
                    <input type="number" name="nik" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Jenis Kelamin</label>
                    <select name="kelamin"  class="form-control">
                        <option value="L">Laki - Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Provinsi</label>
                            <select name="prov_id" id="prov_id" class="form-control">
                                <option value="" selected disabled>Pilih Provinsi</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Kota</label>
                            <select name="kota_id" id="prov_id" class="form-control">
                                <option value="" selected disabled>Pilih Kota</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div
