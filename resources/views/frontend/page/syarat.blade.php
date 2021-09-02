@extends ('frontend/layout.app')
@section ('title', 'Herbal Skincare')

@section ('content')

    <!-- Breadcrumb Section Begin -->
    <!-- <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Beranda</a>
                        <span>Mitra</span>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Breadcrumb Form Section Begin -->

    <!-- Syarat Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 border">
                    <div class="filter-widget">
                        <h4 class="fw-title">MITRA RESMI SR12</h4>
                        <ul class="ml-3">
                            <li><a href="#" onclick="syaratPage('syarat1')">Persebaran Mitra</a></li>
                            <li><a href="#" onclick="syaratPage('syarat2')">Kenapa Harus Gabung?</a></li>
                            <li><a href="#" onclick="syaratPage('syarat3')">Ketentuan Umum</a></li>
                            <li><a href="#" onclick="syaratPage('syarat4')">Target Mitra</a></li>
                            <li>
                                <a href="#">
                                    Cara Gabung
                                </a>
                                <ul class="pl-4">
                                    <li><a href="#" onclick="syaratPage('syarat5')">Marketer</a></li>
                                    <li><a href="#" onclick="syaratPage('syarat6')">Reseller</a></li>
                            @if(session()->get('phone_viewer') != null)
                                        <li><a href="#" onclick="syaratPage('syarat7')">Sub-Agen</a></li>
                                        <li><a href="#" onclick="syaratPage('syarat8')">Agen</a></li>
                                    </ul>
                                </li>
                                <li><a href="#" onclick="syaratPage('syarat9')">Distributor Utama</a></li>
                            @else
                                        <li><a href="#" data-toggle="modal" data-target="#exampleModalCenter">Sub-Agen</a></li>
                                        <li><a href="#" data-toggle="modal" data-target="#exampleModalCenter">Agen</a></li>
                                    </ul>
                                </li>
                                <li><a href="#" data-toggle="modal" data-target="#exampleModalCenter">Dristributor Utama</a></li>
                            @endif
                            <li><a href="#" onclick="syaratPage('syarat10')">Kenapa SR12</a></li>
                            <li><a href="#" onclick="syaratPage('syarat11')">Kenapa Harus Gabung</a></li>
                            <li><a href="#" onclick="syaratPage('syarat12')">Kesimpulan</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-list">
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="syarat1" class="syarat {{ $syarat == 'syarat5' || $syarat == 'syarat6' || $syarat == 'syarat8' ? 'd-none': '' }}">
                                    <div class="section-title tools">
                                        <h3>PERSEBARAN MITRA</h3>
                                    </div>
                                    <div class="blog-detail-desc">
                                        <p>
                                            SR12 Herbal Store adalah marketplace khusus produk SR12 Herbal Skincare. Marketplace ini menyediakan pemasaran produk SR12 Herbal Skincare untuk seluruh wilayah indonesia, mulai dari Pulau Jawa, Pulau Sumatera, Kalimantan, Sulawesi, Nusa Tenggara, Maluku, dan sampai pulau Papua. Di samping itu, pemasaran produk SR12 juga sudah masuk pemasaran Luar Negeri. Melalui marketplace ini, konsumen bisa mendapatkan produk SR12 dari mitra terdekat yang berada di Kota/ Kabupaten tempat tinggal atau sesuai domisislinya. Marketplace ini juga sangat membantu bagi konsumen menemukan Mitra Resmi SR12 setiap kota/ kabupaten jika sedang tidak berada di daerah domisili (luar kota)
                                        </p>
                                        <p>Untuk lebih bisa melihat persebaran mitra SR12 Herbal Store, silahkan cek untuk daerah berikut:</p>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="prov_id">
                                                        <option value="">-Provinsi-</option>
                                                        @foreach($prov as $no => $prov)
                                                            <option value="{{ $prov->prov_id }}">
                                                                {{ $prov->prov_nama}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @if(isset($umkm))
                                                    <script>
                                                        document.getElementById('prov_id').value =
                                                            '<?php echo $umkm->prov_id ?>'
                                                    </script>
                                                    @endif
                                                    @error('prov_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" id="kota_id">
                                                        <option value="">-Kota-</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-center">No</th>
                                                        <th scope="col" class="text-center">Nama Mitra</th>
                                                        <th scope="col" class="text-center">Posisi</th>
                                                        <th scope="col" class="text-center">Kota</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="list_mitra">

                                                </tbody>
                                            </table>
                                        </div>
                                        <p>
                                            Jika data belum menemukan Mitra Resmi SR12 Herbal Store di daerah tersebut, apakah anda tertarik menjadi Mitra Resmi SR12 Herbal Store untuk mengisi kekosongan di kota/kabupaten tersebut?
                                        </p>
                                        <div class="col-12 d-flex justify-content-end text-white">
                                            <a href="{{ route('user.register') }}" class="btn btn-warning">Daftar Mitra</a>
                                        </div>
                                    </div>
                                </div>
                                <div id="syarat2" class="syarat d-none">
                                    <div class="section-title tools">
                                        <h3>KENAPA HARUS GABUNG SR12 HERBAL STORE?</h3>
                                    </div>
                                    <div class="owl-carousel owl-why-join">
                                        <div class="item"><img src="{{asset('frontend/img/mitra/why/ekonomi_umat.jpg')}}" alt=""></div>
                                        <div class="item"><img src="{{asset('frontend/img/mitra/why/kebermanfatan.jpg')}}" alt=""></div>
                                        <div class="item"><img src="{{asset('frontend/img/mitra/why/mentoring_bisnis.jpg')}}" alt=""></div>
                                        <div class="item"><img src="{{asset('frontend/img/mitra/why/mitra_tersebar.jpg')}}" alt=""></div>
                                        <div class="item"><img src="{{asset('frontend/img/mitra/why/market_luas.jpg')}}" alt=""></div>
                                        <div class="item"><img src="{{asset('frontend/img/mitra/why/mudah_digunakan.jpg')}}" alt=""></div>
                                        <div class="item"><img src="{{asset('frontend/img/mitra/why/produk_lengkap.jpg')}}" alt=""></div>
                                    </div>
                                    <div class="posted-by mt-5">
                                        <div class="pb-text">
                                            <h5>Ekonomi Umat :</h5>
                                            <p>
                                                Setiap orang bisa bergabung di bisnis SR12, karena untuk gabung di bisnis SR12 tidak harus dengan modal besar. Maka secara tidak langsung Bisnis SR12 telah menjadi lapangan pekerjaan bagi siapapun yang memiliki semangat dalam melakukan jual beli dan bisnis. Sehingga bisnis SR12 juga dapat membantu meningkatkan perekonomian di lingkungan kita.
                                            </p>
                                        </div>
                                        <div class="pb-text">
                                            <h5>Kebermanfaatan :</h5>
                                            <p>
                                                Gabung dengan SR12 sama halnya dengan bergabung untuk menebar manfaat bagi sesama. Selain membantu sesama dalam memenuhi kebutuhannya, SR12 juga membantu sesama untuk memperbaki perekonomian dalam hal ini mengurangi angka pengangguran dan kemiskinan dilingkungan tempat tinggal.
                                            </p>
                                        </div>
                                        <div class="pb-text">
                                            <h5>Mentoring Bisnis :</h5>
                                            <p>
                                                Dengan adanya mentoring dalam menjalankan bisnis kita diharapkann bisnis yang kita jalankan akan tetap maju dan berkembang meskipun kita menemui kendala dan tantangan dalam menjalankannya.
                                            </p>
                                        </div>
                                        <div class="pb-text">
                                            <h5>Mitra Tersebar :</h5>
                                            <p>
                                                Bisnis SR12 membuka peluang untuk semua orang dimanapun berada, sehingga persebaran mitra / penjual resmi produk SR12 tersebar di setiap Kota/ Kabupaten. Jika di suatu Kota/ Kabupaten belum ada mitra SR12 Herbal Store, maka kamu berpeluang besar menjadi mitra utama di Kota/ Kabupaten tersebut.
                                            </p>
                                        </div>
                                        <div class="pb-text">
                                            <h5>Mudah Digunakan :</h5>
                                            <p>
                                                Produk SR12 Herbal Skincare adalah produk yang pada umumnya dibutuhkan oleh pria dan wanita. Baik untuk kesehatan kulit, perawatan tubuh maupun untuk kebutuhan kesehatan tubuh. Produk yang dipasarkan adalah produk yang aman dan sudah terdaftar BPOM. Produk herbal yang dipasarkan juga aman dikonsumsi oleh setiap umur. Belanja di Marketplace SR12 Herbal Store sangatlah mudah, tidak ribet, pilih produk, tinggal pilih di daerah mana kita mau belanja, transfer, dan tunggu produk sampai diantarkan kurir.
                                            </p>
                                        </div>
                                        <div class="pb-text">
                                            <h5>Produk Lengkap :</h5>
                                            <p>
                                            SR12 herbal store adalah marketplace khusus produk SR12 Herbal skincare yang merupakan kumpulan mitra (penjual) produk SR12 di setiap Kota/ Kabupaten yang tersebar di seluruh wilayah Indonesia. Sehingga bisa menjamin untuk ketersediaan produk SR12
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div id="syarat3" class="syarat d-none">
                                    <div class="section-title tools">
                                        <h3>KETENTUAN UMUM MENJADI MITRA SR12</h3>
                                    </div>
                                    <ol class="list-group list-group-flush">
                                        <li>Warga negara Indonesia dibuktikan dengan identitas diri yang sah </li>
                                        <li>Mendaftarkan diri secara online maupun offline</li>
                                        <li>Seluruh mitra SR12 Herbal Skincare akan memperoleh nomor keanggotaan </li>
                                        <li>Tidak memiliki hubungan kekerabatan kekeluargaan dg management dan karyawan perusahaan</li>
                                        <li>Mitra wajib turut serta menjaga nama baik perusahaan</li>
                                        <li>Mitra wajib memberikan informasi data diri dengan benar dan lengkap</li>
                                        <li>Mitra yang sudah gabung akan didaftarkan oleh Distributor ke perusahaan</li>
                                        <li>Bersedia mematuhi kode etik dan peraturan kemitraan</li>
                                        <li>Mitra yang telah menikah, keanggotaan bersifat pasangan</li>
                                        <li>Dilarang menjual dan memberikan diskon diluar ketentuan yang ditetapkan perusahaan</li>
                                    </ol>
                                </div>
                                <div id="syarat4" class="syarat d-none">
                                    <div class="section-title tools">
                                        <h3>TARGET MITRA SR12</h3>
                                    </div>
                                    <p>
                                        Apakah kamu:
                                    </p>
                                    <ul class="list-group list-group-flush">
                                        <li>Ibu rumah tangga yang mau penghasilan tambahan?</li>
                                        <li>Seseorang yang mau jualan namun tidak punya produk?</li>
                                        <li>Mamah muda yang lagi nyari skincare?</li>
                                        <li>Mamah muda yang diminta suaminya nggak usah ikut kerja kantoran?</li>
                                        <li>Seorang suami yang ingin istri punya usaha di rumah?</li>
                                        <li>Seorang dropshiper ebay yang lagi kena suspend massal?</li>
                                        <li>Dropshiper yang bingung markup harga karena sudah banyak saingan?</li>
                                        <li>Seorang reseler produk yang sudah bisa jualan?</li>
                                        <li>Seorang pelamar kerja yang sudah apply sana sini tak kunjung ada panggilan?</li>
                                        <li>Seorang mahasiswa yang mau punya kegiatan yang bisa menghasilkan pendapatan ketika kuliah?</li>
                                        <li>Mahasiswa/mahasiswi yang lulus nggak mau ngelamar kerjaan?</li>
                                        <li>Sarjana yang terpaksa pulang kampung dan belum dapat kerjaan?</li>
                                        <li>Seorang reseler produk yang nggak tau cara jualan?</li>
                                        <li>Pemilik toko online yang sepi orderan?</li>
                                        <li>Karyawan kantoran yang dirumahkan karena pandemi tak berkesudahan?</li>
                                    </ul>
                                    <p class="mt-5">
                                        Jika jawaban kamu adalah "YA", maka kamu sudah berada di tempat yang tepat, bersama SR12 Herbal Store kamu akan:
                                    </p>
                                    <ul class="list-group list-group-flush">
                                        <li>Punya penghasilan tambahan</li>
                                        <li>Mendapatkan supply produk skincare bermutu siap jual dan sudah terdaftar BPOM</li>
                                        <li>Dibimbing langkah demi langkah untuk bisa menjual</li>
                                        <li>Mendapatkan support sistem</li>
                                        <li>Dibimbing cara membangun bisnis dari Level Marketer sampai posisi Distributor</li>
                                    </ul>
                                    <p class="mt-5">
                                        Kami sangat menyadari bahwa hampir setiap orang kini menginginkan sebuah bisnis yang benar-benar menghasilkan dan bisa dikerjakan dari rumah. Akan tetapi, sebagian besar bingung bagaimana memulainya? Produknya? cara jualannya?
                                    </p>
                                    <p>
                                        Tentu kamu pernah merasakan kondisi seperti ini:
                                    </p>
                                    <ul class="list-group list-group-flush">
                                        <li>Diremehkan dan malu karena masih menganggur</li>
                                        <li>Waktu yang sangat minim dan tidak berkualitas untuk berkumpul dengan keluarga</li>
                                        <li>Berangkat pagi pulang petang tak sempat bermain dengan si kecil</li>
                                        <li>Punya toko offline tapi sepi pembeli</li>
                                        <li>Mau jualan online nggak punya produknya</li>
                                        <li>Udah punya produk tapi nggak tau caranya</li>
                                        <li>Penghasilan kembang kempis tak bisa buat tabungan</li>
                                    </ul>
                                    <p class="mt-5">
                                        Kabar baiknya bergabung di bisnis ini kami akan mengajari bagaimana berbisnis dengan SR12 skincare yang terbukti telah membantu banyak mitranya memiliki kualitas hidup yang lebih baik.
                                    </p>
                                </div>
                                <div id="syarat5" class="syarat {{ $syarat == 'syarat5' ? '': 'd-none' }}">
                                    <div class="section-title tools">
                                        <h3>BAGAIMANA PERSYARATAN MENJADI MITRA SR12?</h3>
                                    </div>
                                    <p class="mt-5">
                                        Berikut akan dijelaskan persyaratan mulai jadi Marketer sampai Distributor Mitra SR12.
                                        Persyaratan ini sesuai dengan Update Kode Etik & Peraturan Kemitraan SR12 2021
                                    </p>
                                    <h4>Cara gabung jadi MARKETER SR12</h4>
                                    <i>(Tingkatan paling ringan, cocok untuk pemula/dipakai sendiri)</i>
                                    <ul class="list-group list-group-flush">
                                        <li>Tanpa minimal order, akad atau perjanjian awal adalah bekerja dengan sistem pemabayaran komisi dibayarkan awal bulan atau setiap tanggal 1 (satu) bulan berikutnya. Contoh : Penjualan dilakukan di bulan Januari maka pembayaran komisi diberikan bulan Februari.</li>
                                        <li>Penjualan dilakukan secara online dan offline. Pengiriman dropship dilakukan oleh leader tempat bergabung atau terdaftar.</li>
                                        <li>Pembayaran dropship ditransfer ke rekening leader tempat bergabung atau yang mengajak bergabung bisnis.</li>
                                        <li>
                                            Komisi 15% cair setiap akumulasi pembelian 500.000 (lima ratus ribu rupiah)
                                            <ul class="list-group list-group-flush">
                                                <li>Contoh 1 :</li>
                                                <li>
                                                    Marketer A pada bulan Januari 2021 melakukan penjualan sebesar 400.000,- (empat ratus ribu rupiah) maka akhir bulan marketer A tidak menerima komisi penjualan, bulan Februari 2021 marketer melakukan penjualan sebesar 300.000,- (tiga ratus ribu rupiah). maka akumulasi penjualan 2 (dua) bulan tersebut sebesar 700.000,- (tujuh ratus ribu rupiah) dikalikan 15% dan menjadi hak marketer yang akan dibayarkan pada awal bulan maret 2021.
                                                </li>
                                                <li>
                                                    Contoh 2 :
                                                </li>
                                                <li>
                                                    Marketer B pada bulan Januari 2021 melakukan penjualan sebesar 200.000,- (dua ratus ribu rupiah), maka akhir bulan ybs tidak akan menerima komisi penjualan. Bulan Februari 2021 mareketer melakukan penjualan kembali sebesar 200.000,- (dua ratus ribu rupiah), maka marketer masih belum mendapatkan komisi. Bulan Maret 2021 melakukan penjualan lagi sebesar 100.000,- (seratus ribu rupiah). maka akumulasi penjualan 3 (tiga) bulan tersebut sebesar 500.000,- (lima ratus ribu rupiah) dikalikan 15% dan menjadi hak marketer yang akan dibayarkan pada awal bulan April 2021.
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            Jika dalam 3 (tiga) bulan berturut-turut memenuhi omset 800.000,- (delapan ratus ribu rupiah), maka secara otomatis di bulan ke empat akan naik ke posisi Reseler (Jalur Prestasi).
                                        </li>
                                        <li>
                                            Jika terjadi perselisihan terkait pembayaran hak marketer, agar dapat diselesaikan secara kekeluargaan dengan prinsip saling menguntungkan dan yang paling kecil kerugian yang ditimbulkan
                                        </li>
                                    </ul>
                                    <p class="mt-5">
                                        Di SR12 Herbal Store kami menyaring calon mitra yang benar-benar serius. Untuk menjadi marketer hanya diperlukan belanja awal salah satu produk saja untuk membuktikan manfaat dari produk yang akan kita promosikan kembali. Posisi marketer ini sangat cocok untuk kamu yang ingin coba-coba berbisnis ataupun pemakaian produk untuk dipakai sendiri.
                                    </p>
                                    <p>
                                        Artinya:
                                        Komisi 15% setiap kali pembelian produk sudah pasti didapat. Syarat pencairan komisi dapat diakumulasikan, artinya jika setiap omset total lebih besar atau sama dengan 500rb omset, maka komisi bisa diberikan. Nggak ada ruginya kan?
                                    </p>
                                </div>
                                <div id="syarat6" class="syarat {{ $syarat == 'syarat6' ? '': 'd-none' }}">
                                    <div class="section-title tools">
                                        <h3>BAGAIMANA PERSYARATAN MENJADI MITRA SR12?</h3>
                                    </div>
                                    <p class="mt-5">
                                        Berikut akan dijelaskan persyaratan mulai jadi Marketer sampai Distributor Mitra SR12.
                                        Persyaratan ini sesuai dengan Update Kode Etik & Peraturan Kemitraan SR12 2021
                                    </p>
                                    <h4>Cara gabung jadi RESELER SR12</h4>
                                    <i>(Rekomendasi untuk yg hobi jualan & mendapatkan Tools promosi dari kami)</i>
                                    <ul class="list-group list-group-flush">
                                        <li>
                                            Melakukan order pertama (first order) senilai minimal 500.000,- (lima ratus ribu rupiah) atau 400.000,- (empat ratus ribu rupiah) setelah diskon 20%
                                        </li>
                                        <li>
                                            Khusus yang telah menjadi mitra (Marketer), kesempatan menjadi Reseler melalui jalur omset minimal 800.000,- (delapan ratus ribu rupiah) dengan omset pribadi minimal 300.000,- (tiga ratus ribu rupiah) berturut-turut selama 3 (tiga) bulan.
                                        </li>
                                        <li>
                                            Repeat order minimal untuk mitra reseler adalah 50.000,- (lima puluh ribu rupiah) sebelum diskon, jika di bawah ketentuan tersebut maka akan diberikan diskon sebesar 15%.
                                        </li>
                                        <li>
                                            Omset minimal 500.000,- (lima ratus ribu rupiah) per bulan dengan omset pribadi minimal 200.000,- (dua ratus ribu rupiah).
                                        </li>
                                        <li>
                                            Jika dalam 1 (satu) bulan tidak dapat mencapai omset minimal, maka bulan berikutnya akan mendapatkan sanksi potongan menjadi 15% dengan masa dispensasi 3 (tiga) bulan.
                                        </li>
                                        <li>
                                            Jika setelah masa dispensai berakhir tetap tidak dapat memenuhi omset dan omset pribadi minimal, maka tingkatan mitra otomatis menjadi marketer, kesempatan menjadi reseler dan mendapatkan diskon 20% akan diberikan kembali jika ketentuan nomor 1 atau 2 di atas terpenuhi.
                                        </li>
                                    </ul>
                                    <p>Secara ringkas dapat diartikan sebagai berikut:</p>
                                    <ul class="list-group list-group-flush">
                                        <li>First order 500rb langsung diskon 20%, jadi belanja awal 400rb dapat barang senilai 500rb</li>
                                        <li>Sangat cocok untuk kamu yang mulai serius ingin jualan</li>
                                        <li>Minimal repeat order 50rb</li>
                                        <li>Ada target omset minimal perbulan sebesar 500rb</li>
                                        <li>Diskon lebih besar dari marketer yaitu 20%</li>
                                    </ul>
                                </div>
                                <div id="syarat7" class="syarat d-none">
                                    <div class="section-title tools">
                                        <h3>BAGAIMANA PERSYARATAN MENJADI MITRA SR12?</h3>
                                    </div>
                                    <p class="mt-5">
                                        Berikut akan dijelaskan persyaratan mulai jadi Marketer sampai Distributor Mitra SR12.
                                        Persyaratan ini sesuai dengan Update Kode Etik & Peraturan Kemitraan SR12 2021
                                    </p>
                                    <h4>Cara gabung jadi SUB-AGEN SR12</h4>
                                    <i>(Rekomendasi untuk yg hobi jualan & siap stok produk, serta mendapatkan akun promosi dari kami)</i>
                                    <ul class="list-group list-group-flush">
                                        <li>
                                            Melakukan order pertama (First order) senilai minimal 5.000.000,- (lima juta rupiah) omset atau 3.500.000,- (tiga juta lima ratus ribu rupiah) setelah diskon 30%.
                                        </li>
                                        <li>
                                            Khusus yang telah menjadi mitra, kesempatan menjadi sub agen melalui jalur omset minimal 4.000.000,- (empat juta rupiah) dengan omset pribadi minimal 3.000.000,- (tiga juta rupiah) berturut-turut selama 3 (tiga) bulan.
                                        </li>
                                        <li>
                                            Repeat oredr minimal 1.000.000,- (satu juta rupiah) setelah diskon 30%, jika di bawah minimal ketentuan RO maka diberikan diskon reseler sebesar 20%.
                                        </li>
                                        <li>
                                            Omset minimal 4.000.000,- (empat juta rupiah) per bulan.
                                        </li>
                                        <li>
                                            Jika dalam 3 bulan berturut-turut sub agen tidak dapat mencapai omset minimal maka memasuki bulan ke-4 (empat) status mitra akan diturunkan ke tingkatan di bawahnya.
                                        </li>
                                        <li>
                                            Kesempatan menjkadi sub agen kembali jika salah satu dari nomor 1 atau 2 di atas terpenuhi.
                                        </li>
                                    </ul>
                                    <p class="mt-5">
                                        Artinya cara gabung SR12 untuk posisi Sub Agen yaitu:
                                    </p>
                                    <ul class="list-group list-group-flush">
                                        <li>
                                            First order 3,5jt setelah diskon 30%. Belanja 3,5jt dapat barang senilai 5jt
                                        </li>
                                        <li>
                                            Repeat order minimal 1jt setelah diskon untuk bisa dapat diskon 30%. Belanja 1jt dapat produk senilai 1,43jt.
                                        </li>
                                        <li>
                                            Omset minimal perbulan 4.000.000,- (empat juta rupiah)
                                        </li>
                                    </ul>
                                </div>
                                <div id="syarat8" class="syarat d-none">
                                    <div class="section-title tools">
                                        <h3>BAGAIMANA PERSYARATAN MENJADI MITRA SR12?</h3>
                                    </div>
                                    <p class="mt-5">
                                        Berikut akan dijelaskan persyaratan mulai jadi Marketer sampai Distributor Mitra SR12.
                                        Persyaratan ini sesuai dengan Update Kode Etik & Peraturan Kemitraan SR12 2021
                                    </p>
                                    <h4>Cara gabung jadi AGEN SR12</h4>
                                    <i>(Rekomendasi untuk sistem grosir & berpeluang menjadi Distributor setiap Kota/kabupaten)</i>
                                    <ul class="list-group list-group-flush">
                                        <li>
                                            Melakukan order pertama (First order) kepada distributor atau agen senilai minimal 25.000.000,- (dua puluh lima juta rupiah) atau 15.000.000,- (lima belas juta rupiah) setelah diskon 40%.
                                        </li>
                                        <li>
                                            Khusus yang telah menjadi mitra, kesempatan menjadi agen melalui jalur omset minimal 15.000.000,- (lima belas juta rupiah) dengan omset pribadi minimal 10.000.000,- (sepuluh juta rupiah) berturut-turut selama 3 (tiga) bulan.
                                        </li>
                                        <li>
                                            Repeat order minimal 2.000.000 (dua juta rupiah) setelah diskon 40%. Jika agen melakukan RO di bawah ketentuan minimal, maka diberlakukan diskon sesuai minimal pembelanjaan yang dilakukan.
                                            <p>Contoh :</p>
                                            <ul class="list-group list-group-flush">
                                                <li>
                                                    Repeat order di bawah 2.000.000,- (dua juta rupiah) namun di atas atau sama dengan 1.000.000,- (satu juta rupiah) maka diberikan diskon Sub Agen sebesar 30%.
                                                </li>
                                                <li>
                                                    Repeat order di bawah 1.000.000,- (satu juta rupiah) maka diberikan diskon reseler sebesar 20%
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            Omset minimal agen ditetapkan sebesar 15.000.000,- (lima belas juta rupiah) perbulan
                                        </li>
                                        <li>
                                            Jika dalam 3 (tiga) bulan berturut-turut, agen tidak dapat mencapai omset minimal sesuai ketentuan maka memasuki bulan ke-4 (empat) status mitra akan diturunkan ke tingkatan mitra di bawahnya. Kesempatan menjadi agen kembali jika salah satu dari nomor 1 atau 2 di atas terpenuhi.
                                        </li>
                                    </ul>
                                    <p class="mt-5">Artinya cara jadi mitra SR12 untuk tingkatan agen yaitu:</p>
                                    <ul class="list-group list-group-flush">
                                        <li>First order senilai 25jt langsung diskon 40%. Belanja 15jt dapat produk seharga 25jt.</li>
                                        <li>Target omset minimal 15jt perbulan.</li>
                                        <li>Minimal repeat order 2jt, dimana dapat produk seharga 3,33jt.</li>
                                    </ul>
                                </div>
                                <div id="syarat9" class="syarat d-none">
                                    <div class="section-title tools">
                                        <h3>BAGAIMANA CARA MENJADI DISTRIBUTOR UTAMA SR12?</h3>
                                    </div>
                                    <span>(Rekomendasi untuk yang mau menjadi Distributor di daerahmu)</span>
                                    <ul class="list-group list-group-flush">
                                        <li>Khusus distributor hanya dapat dicapai dengan jalur pretasi.</li>
                                        <li>Omset minimal akumulasi 100jt/bulan dengan omset pribadi 35jt.</li>
                                        <li>Repeat order minimal 10jt.</li>
                                        <li>Sederhananya posisi DISTRIBUTOR tidak dapat dicapai dengan melakukan First Order.</li>
                                    </ul>
                                </div>
                                <div id="syarat10" class="syarat d-none">
                                    <div class="section-title tools">
                                        <h3>KENAPA MEMILIH SR12 SKINCARE?</h3>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li>
                                        Produk SR12 skincare sangat lengkap dan terus bertambah seiring waktu.
                                        </li>
                                        <li>
                                        Produk perawatan kulit wajah; mencerahkan, kulit kering, berminyak, jerawat, flek hitam, mata panda, make up, masker, dan anti aging.
                                        </li>
                                        <li>
                                        Perawatan kulit lengkap; mencerahkan kulit, bekas luka, stretchmark, pecah-pecah, dan bau badan.
                                        </li>
                                        <li>
                                        Herbal kesehatan; keputihan, diet sehat, dan menambah berat badan.
                                        </li>
                                        <li>
                                        Produk yang dipasarkan sudah melalui serangkaian uji yang ketat sehingga terbukti aman dan sudah terdaftar BPOM.
                                        </li>
                                        <li>
                                        Sudah ada ribuan testimoni positif bertebaran di dunia digital. Artinya produk yang kami pasarkan sudah diterima oleh masyarakat. Kamu bisa menemukannya di internet, marketplace, bahkan ketika sedang bersosial media.
                                        </li>
                                        <li>
                                        Produk berkhasiat dengan harga terjangkau.
                                        </li>
                                        <li>
                                        Brand asli buatan putra bangsa.
                                        </li>
                                        <li>Pasar skincare di Indonesia sangat besar.</li>
                                        <li>Repeat order untuk produk skincare sangat tinggi.</li>
                                    </ul>
                                </div>
                                <div id="syarat11" class="syarat d-none">
                                    <div class="section-title tools">
                                        <h3>KENAPA HARUS BERGABUNG BERSAMA KAMI?</h3>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li>Bingung jualan apa? Sama Kami produknya sudah ada</li>
                                        <li>Produk berkualitas, legal, ber-BPOM</li>
                                        <li>Ribuan testimoni produk bertebaran</li>
                                        <li>Terbukti laris di pasaran</li>
                                        <li>Produk skincare bukan produk musiman (bisnis awet). Tipikal customer habis beli lagi</li>
                                        <li>Dibimbing cara jualan yang efektif</li>
                                        <li>Materi super lengkap</li>
                                        <li>Ada group khusus</li>
                                        <li>Dibantu trafik lewat website</li>
                                    </ul>
                                </div>
                                <div id="syarat12" class="syarat d-none">
                                    <div class="section-title tools">
                                        <h3>KESIMPULAN</h3>
                                    </div>
                                    <P>
                                        Cara untuk menjadi Mitra SR12 ataupun bergabung dengan bisnis SR12 sangatlah mudah. Untuk pemula cocok memilih tingkatan Marketer (cukup dengan membeli satu produk SR12), program Marketer cocok juga buat kamu yang ingin belanja lebih murah baik untuk pemakaian sendiri maupun untuk penjualan secara offline. Jika kamu ingin lebih serius jualan maka lebih baik ambil program Reseler. Tingkatan Reseler (first order sebesar 500rb produk langsung diskon 20%), sedangkan untuk yang ingin serius dan sudah punya basic jualan online atau offline kami sarankan ambil jalur kemitraan Sub Agen atau Agen.
                                    </P>
                                    <ul class="list-group list-group-flush">
                                        <li>
                                            Hubungi kami lewat whatsapp (klik logo whatsaap di kanan bawah)
                                        </li>
                                        <li>
                                            Pilih leader yang sesuai atau yang paling dekat dengan domisilimu. Hal ini berguna untuk meminimalisir ongkos kirim dan mempermudah konsultasi apabila ingin konsultasi kopdar.
                                        </li>
                                        <li>
                                            Kamu bisa daftar atau gabung jadi mitra Marketer, Reseler, Sub Agen atau Agen
                                        </li>
                                        <li>
                                            Untuk bisa mengakses materi dan tool, silahkan buat akun di menu <a href="{{ route('user.register') }}"> DAFTAR MITRA.</a>
                                        </li>
                                        <li>
                                            Pengaktifan member area di website akan didaftarkan oleh leader tempat kamu mendaftar.
                                        </li>
                                        <li>
                                            Yang bisa akses member area hanya kamu yang sudah memiliki kartu member SR12 atau tingkatan Reseler ke atas sampai Distributor
                                        </li>
                                        <li>
                                            Untuk kamu yang ingin menjadi Marketer, silahkan langsung saja bikin akun di Menu DAFTAR->DAFTAR MITRA dan kamu akan mendapatkan akun marketer dan dibimbing untuk strategi ke-depannya.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blog-large-pic text-center">
                        <img src="{{asset('frontend/img/mitra/fotbar.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-12 blog-details-inner mt-5">
                    <div class="section-title">
                        <h2>Kamu Juga Akan Mendapatkan Ilmu Strategi Pemasaran</h2>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="owl-carousel owl-ilmu-strategi">
                                <div class="item text-center">
                                    <a href="#">
                                        <img src="{{asset('frontend/img/mitra/ilmu1.jpeg')}}" alt="">
                                    </a>
                                    <span >Kunci Jualan disosmed</span>
                                </div>
                                <div class="item text-center">
                                    <a href="#">
                                        <img src="{{asset('frontend/img/mitra/ilmu2.jpeg')}}" alt="">
                                    </a>
                                    <span >Produk Konowledge</span>
                                </div>
                                <div class="item text-center">
                                    <a href="#">
                                        <img src="{{asset('frontend/img/mitra/ilmu3.jpeg')}}" alt="">
                                    </a>
                                    <span >Reseler Sukses SR12</span>
                                </div>
                                <div class="item text-center">
                                    <a href="#">
                                        <img src="{{asset('frontend/img/mitra/ilmu4.jpeg')}}" alt="">
                                    </a>
                                    <span >MAP Bisnis SR12</span>
                                </div>
                                <div class="item text-center">
                                    <a href="#">
                                        <img src="{{asset('frontend/img/mitra/ilmu5.jpeg')}}" alt="">
                                    </a>
                                    <span >Strategi Marketing</span>
                                </div>
                                <div class="item text-center">
                                    <a href="#">
                                        <img src="{{asset('frontend/img/mitra/ilmu6.jpeg')}}" alt="">
                                    </a>
                                    <span >Rumus Menghasilkan Cuan</span>
                                </div>
                                <div class="item text-center">
                                    <a href="#">
                                        <img src="{{asset('frontend/img/mitra/ilmu7.jpeg')}}" alt="">
                                    </a>
                                    <span >Home Sharing</span>
                                </div>
                                <div class="item text-center">
                                    <a href="#">
                                        <img src="{{asset('frontend/img/mitra/ilmu8.jpeg')}}" alt="">
                                    </a>
                                    <span >Kurikulum Mitra SR12</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body inner-header bg-modal-search">
                    @if(Session::has('messages'))
                        <p class="alert alert-info">{{ Session::get('messages') }}</p>
                    @endif
                    <form action="{{ route('viewer-syarat') }}" method="post">
                        @csrf
                        @if(session('errors'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Ada yang salah:
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label class="text-light">Silahkan masukan data berikut untuk melanjutkan</label>
                            <input type="text" class="form-control" name="name_viewer" placeholder="Nama" value="{{ old('name_viewer') }}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="phone" placeholder="08**********" value="{{ old('phone') }}">
                        </div>
                        <div class="text-right">
                            <button type="submit" class="site-btn">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function syaratPage(id) {
            $('.syarat').addClass('d-none');
            let syarat_class = document.getElementById(id);
            cek = syarat_class.classList[1];
            if(cek == undefined){
                $(`#${id}`).addClass('d-none');
            }else{
                $(`#${id}`).removeClass('d-none');
            }
        }

        function inputNama(id) {
            $(`#${id}`).show();
        }
    </script>
    <?php 
        if($syarat == "syarat8"){
            if(session()->get('phone_viewer') != null){
    ?>            <script>
                    console.log("ada nomor");
                    syaratPage('syarat8');
                </script>
    <?php   }else{
    ?>          <script>
                    // $('#exampleModalCenter').modal("show");
                    $('#exampleModalCenter').attr('style', 'display: inline; padding-right: 17px;');
                    $('#exampleModalCenter').attr('class', 'modal fade show');
                </script>
    <?php   }
        }
    ?>
    <script>
        // Cara Mengambil Kota Berdasarkan Provinsi
        $('#prov_id').change(function(e) {
            e.preventDefault();
            var kota_id = '';
            var prov_id = $('#prov_id').val();
            axios.post("{{url('carikotauser')}}", {
                'prov_id': prov_id,
            }).then(function(res) {
                console.log(res)
                var kota = res.data.kota
                for (var i = 0; i < kota.length; i++) {
                    kota_id += "<option value='" + kota[i].kota_id + "'>" + kota[i].kota_nama + "</option>"
                }
                $('#kota_id').html(kota_id)
            }).catch(function(err) {
                console.log(err);
            })
        });

        $('#kota_id').change(function(e) {
            e.preventDefault();
            $('#list_mitra').load("{{ url('cari_mitra') }}/"+ this.value);

        })
    </script>

@endsection