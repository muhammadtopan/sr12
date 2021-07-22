@extends ('frontend/layout.app')
@section ('title', 'Herbal Skincare')

@section ('content')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Profile</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Profile Begin -->
    <section class="checkout-section">
        <div class="container">
            <form action="#" class="checkout-form">
                <div class="row">
                    <div class="col-12">
                        <div class="product-tab">
                            <div class="tab-item">
                                <ul class="nav col-12" role="tablist">
                                    <li>
                                        <a class="active" data-toggle="tab" href="#tab-1" role="tab">Profile</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab-2" role="tab">Point <span class="bg-warning text-white p-1 rounded">30</span></a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab-3" role="tab">Pembelian</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-item-content">
                                <div class="tab-content">
                                    <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-12 text-center">
                                                <h4>Profile</h4>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label for="costumer_name">Nama</label>
                                                        <input type="text" id="costumer_name" name="costumer_name" value="{{ $akun->costumer_name }}" readonly>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label for="costumer_email">Email</label>
                                                        <input type="text" id="costumer_email" name="costumer_email" value="{{ $akun->costumer_email}}" readonly>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label for="costumer_phone">Telepon</label>
                                                        <input type="text" id="costumer_phone" name="costumer_phone" value="{{ $akun->costumer_phone}}" readonly>
                                                    </div>
                                                    <div class="col-lg-12 group-input">
                                                        <label for="costumer_gender">Jenis Kelamin</label>
                                                        <select name="costumer_gender" id="costumer_gender" class="form-control @error('costumer_gender') {{ 'is-invalid' }} @enderror" >
                                                            <option value="LK" <?php echo ($akun->costumer_gender == 'LK') ? 'selected' : '' ?>>Laki-laki</option>
                                                            <option value="PR" <?php echo ($akun->costumer_gender == 'PR') ? 'selected' : '' ?>>Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="col-lg-12">
                                                    <label for="prov_id">Provinsi</label>
                                                    <input type="text" id="prov_id" name="prov_id" value="{{ $akun->prov_nama}}" readonly>
                                                </div>
                                                <div class="col-lg-12">
                                                    <label for="kota_id">Kota/Kab</label>
                                                    <input type="text" id="kota_id" name="kota_id" value="{{ $akun->kota_nama}}" readonly>
                                                </div>
                                                <div class="col-lg-12">
                                                    <label for="costumer_address">Alamat</label>
                                                    <input type="text" id="costumer_address" name="costumer_address" value="{{ $akun->costumer_address}}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade-in" id="tab-2" role="tabpanel">
                                        point
                                    </div>
                                    <div class="tab-pane fade-in" id="tab-3" role="tabpanel">
                                        Pembelian
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Profile End -->
@endsection