<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'HomeController@index')->name('home');
Route::get('syarat/marketer', 'HomeController@syaratMarketer')->name('syarat-marketer');
Route::get('belanjaHemat', 'HomeController@belanjaHemat')->name('belanjaHemat');
Route::get('peluangBisnis', 'HomeController@peluangBisnis')->name('peluangBisnis');
Route::get('shop/product', 'HomeController@product')->name('shop.product');
Route::get('shop/product/{filter}', 'HomeController@product')->name('shop.product.filter');
Route::get('detail-product/{product_id}', 'HomeController@detail_product')->name('detail_product');
//About
Route::get('about', 'HomeController@about')->name('about');
Route::post('download/katalog','Web\KatalogController@download')->name('download-katalog');
Route::get('send/katalog','Mail\MailController@katalog');

Route::get('partnership', 'HomeController@partnership')->name('partnership');
Route::get('syarat-mitra', 'HomeController@syarat_mitra')->name('syarat_mitra');
Route::post('viewer-syarat', 'HomeController@viewerSyarat')->name('viewer-syarat');
Route::get('contact', 'HomeController@contact')->name('contact');
Route::get('blog/{articel}', 'HomeController@articel')->name('blog');
Route::get('testimon/{testimony}', 'HomeController@testimony')->name('testimon');
Route::get('category/product/{id}', 'HomeController@categoroyProduct')->name('category-product');

//ulasan
Route::post('ulasan', 'Backend\UlasanController@store')->name('ulasan');
Route::post('ulasan.active', 'Backend\UlasanController@active')->name('ulasan.active');
Route::post('ulasan.non_active', 'Backend\UlasanController@non_active')->name('ulasan.non_active');


// Filter
Route::post('filter.kategori/{category_id}', 'HomeController@kategori')->name('filter.kategori');
Route::get('filter/packages/{id}', 'HomeController@packageFilter')->name('filter.packages');

// Search
Route::get('search/product', 'HomeController@search')->name('search-product');

// mitra
Route::post('regist/mitra', 'Mitra\DashboardController@registMitra')->name("regist-mitra");
Route::get('login.mitra', 'HomeController@frontMitra')->name('login.mitra');
Route::get('tool', 'HomeController@tool')->name('tool');

//login freelance
Route::group(["middleware" => "unlogin_freelance"], function() {
    Route::get('login/freelance', 'Freelance\FreelanceController@login')->name('login.freelance');
    Route::post('login/freelance', 'Freelance\FreelanceController@AksiLogin');
    Route::post('register/freelance', 'Freelance\FreelanceController@AksiRegister')->name("register.freelance");
});

Route::group(["middleware" => "login_freelance"],function() {
    Route::get('freelance/profile', 'Freelance\FreelanceController@profile')->name('freelance.profile');
    Route::get('freelance/logout', 'Freelance\FreelanceController@logout')->name('freelance.logout');
    Route::get('freelance', 'Freelance\FreelanceController@index')->name('freelance');
    Route::get('freelance/update', 'Freelance\FreelanceController@getUpdateProfile')->name("freelance.profile.update");
    Route::put('freelance/update', 'Freelance\FreelanceController@putUpdateProfile');
    Route::get('freelance/update/photo-profile', 'Freelance\FreelanceController@GetUpdatePhoto')->name("vendor.update.photo.profile");
    Route::put('freelance/update/photo-profile', 'Freelance\FreelanceController@PutUpdatePhoto');

    Route::group(["middleware" => "filter_freelance"], function() {
        Route::get('freelance/r/transaksi', 'Freelance\FreelanceController@rtransaksi')->name('freelance.r.transaksi');
        Route::get('freelance/r/affiliate', 'Freelance\FreelanceController@raffiliate')->name('freelance.r.affiliate');
        Route::get('freelance/deposite', 'Freelance\FreelanceController@deposite')->name('freelance.deposite');
    });
});

//Gudang
Route::group(["prefix" => "gudang"],function() {
    // auth
    Route::group(["middleware" => "product_unit_netto"],function() {
        Route::get('login', 'Gudang\GudangController@getLogin')->name("gudang.login");
        Route::post("login", "Gudang\GudangController@postLogin");
    });

    Route::group(["middleware" => "GudangLogin"],function() {
        Route::get('', 'Gudang\GudangController@index')->name('gudang.dashboard');
        Route::get('profile', 'Gudang\GudangController@profile')->name('gudang.profile');
        Route::get('stock', 'Gudang\GudangController@stock')->name('gudang.stock');
        Route::get('mitra', 'Gudang\GudangController@mitra')->name('gudang.mitra');
        Route::get('sale', 'Gudang\GudangController@sale')->name('gudang.sale');
        Route::get('best_seller', 'Gudang\GudangController@best_seller')->name('gudang.best_seller');
        Route::get('profit', 'Gudang\GudangController@profit')->name('gudang.profit');
        Route::get('laporan', 'Gudang\GudangController@laporan')->name('gudang.laporan');
        Route::get('setting', 'Gudang\GudangController@setting')->name('gudang.setting');

        // orderan
        Route::get('orderan', 'Gudang\GudangController@orderan')->name('gudang.orderan');
        Route::get('/order/{i}', 'Gudang\GudangController@orderanDetail')->name("gudang.orderan.detail");

        // history
        Route::get('history', 'Gudang\GudangController@history')->name('gudang.history');
        Route::get('history/{h}', 'Gudang\GudangController@detailHistory')->name("gudang.detail.history");

        // ro
        Route::get('ro', 'Gudang\GudangController@ro')->name('gudang.ro');
        Route::post("ro", "Gudang\GudangController@postRo");

        // profile
        Route::put('/update-profile', "Gudang\GudangController@UpdateProfile")->name("gudang.update_profile");
        Route::put('/update-password', "Gudang\GudangController@UpdatePassword")->name("gudang.update_password");
        Route::put('/update-foto', "Gudang\GudangController@UpdateFoto")->name("gudang.update_foto");

        // post data mitra
        Route::post('mitra', 'Gudang\GudangController@postDataMitra');
        Route::get('mitra/delete/{m:nama_gudang}', 'Gudang\GudangController@deleteDataMitra')->name("gudang.delete");
        Route::get('mitra/invite/{m}', 'Gudang\GudangController@inviteDetailMitra')->name("gudang.inivite.detail");

        Route::get("logout",function() {
            Session::flush();
            return redirect()->route("gudang.login");
        })->name("gudang.logout");
    });
});

//Costumer Auth
Route::get('user/login', 'Frontend\CostumerController@index')->name('user.login');
Route::get('user/register', 'Frontend\CostumerController@register')->name('user.register');
Route::post('user/aksiregister', 'Frontend\CostumerController@registerAdmin')->name('user.aksiregister');
Route::post('user/aksilogin', 'Frontend\CostumerController@loginAdmin')->name('user.aksilogin');
Route::post('carikotauser', 'Frontend\CostumerController@carikota')->name('carikota');
Route::get('cari_mitra/{id}', 'HomeController@carimitra');

// COSTUMER DAFTAR DENGAN KODE REFERAL
Route::get('user/register/referal/{referal}', 'Frontend\CostumerController@register')->name("register.user.referal");

// cari kota
Route::post('carikota', 'Frontend\DashboardController@carikota')->name('carikota');

// USER SUDAH LOGIN
Route::middleware(['user.login'])->group(function () {
    Route::get('user/profile', 'Frontend\CostumerController@profile')->name('user.profile');
    Route::get('user/logout', 'Frontend\CostumerController@logout')->name('user.logout');
    Route::get('home', 'HomeController@index')->name('home.again');
    Route::post('/add_to_cart/{product_id}', 'Frontend\CartController@store')->name('add_to_cart');
    Route::get('/cart', 'Frontend\CartController@show')->name('cart');
    Route::delete('cart', 'Frontend\CartController@destroy')->name('cart.delete');
    Route::post('checkout', 'Frontend\CartController@checkout')->name('checkout');
    Route::post('/checkout-fix', 'Customer\CheckoutController@checkout')->name("checkout.fix");

    // akun belanjaku
        Route::group(["prefix" => "user/profile/"], function() {
            Route::group(["prefix" => "keranjang"],function() {
                Route::get("/", "Frontend\CostumerController@GetDashboardKeranjang")->name("user.profile.keranjang");
                Route::get('/{tgl}', "Frontend\CostumerController@GetDashboardKeranjangDetail")->name("user.profile.keranjang.detail");
            });

            Route::group(["prefix" => "voucher"],function() {
                Route::get('/', 'Frontend\CostumerController@GetListVoucher')->name("user.profile.voucher");
                Route::get('/voucher-redeem/{v}', 'Frontend\CostumerController@RedeemVoucher')->name("user.profile.voucher.redeem");
                Route::get('/history', 'Frontend\CostumerController@HistoryVoucher')->name("user.profile.voucher.history");
            });

            Route::group(["prefix" => "history/bayar"],function() {
                Route::get('/', 'Frontend\CostumerController@HistoryBayar')->name("user.profile.bayar");
                Route::get('/{order}','Frontend\CostumerController@HistoryBayarDetail')->name("user.profile.bayar.detail");
            });

        });
    // akun belanjaku

});

//Vendor Belum Login
Route::middleware(['vendor'])->group(function () {
    Route::get('vendor', 'Frontend\DashboardController@index')->name('vendor');
    Route::get('register_vendor', 'Frontend\DashboardController@register')->name('register_vendor');
    Route::post('aksiregister_vendor', 'Frontend\DashboardController@registerAdmin')->name('aksiregister_vendor');
    Route::post('aksilogin_vendor', 'Frontend\DashboardController@loginAdmin')->name('aksilogin_vendor');
});

//Vendor Sudah Login
Route::middleware(['vendor.dashboard'])->group(function () {
    //Profile Vendor
    Route::group(["prefix" => "profile"],function() {
        Route::get("", "Backend\ProfileController@GetUpdateProfile")->name("vendor.update.profile");
        Route::put("", "Backend\ProfileController@PutUpdateProfile");
    });
    Route::group(["middleware" => "cek_profile"],function() {
        Route::get('vendor/dashboard', 'Frontend\DashboardController@dashboard')->name('vendor.dashboard');
        // Stock
        Route::get('stock', 'Frontend\StockController@index')->name('stock');
        Route::get('first/stock', 'Vendor\StockAwalController@index')->name('first.stock');
        Route::post('stock/update', 'Frontend\StockController@update')->name('stock.update');
        // Order
        Route::get('vendor/order', 'Vendor\OrderController@index')->name('vendor.order');
        Route::get('vendor/order/details/{order_id}', 'Vendor\OrderController@detail_order')->name('vendor.order.details');
        Route::get("vendor/order/update-status/{order}",'Vendor\OrderController@update_status')->name("vendor.order.update.status");
        //Best Seller
        Route::get('best_seller', 'Vendor\BestOrderController@index')->name('best_seller');
        //deposit
        Route::get('vendor.deposit', 'Vendor\DepositController@index')->name('vendor.deposit');
    });
    Route::get('vendor.logout', 'Frontend\DashboardController@logout')->name('vendor.logout');
    // Stock Product Vendor
});


// BACKEND BACKEND BACKEND BACKEND BACKEND BACKEND BACKEND
// BACKEND BACKEND BACKEND BACKEND BACKEND BACKEND BACKEND
// BACKEND BACKEND BACKEND BACKEND BACKEND BACKEND BACKEND
Route::middleware(['admin'])->group(function () {
    Route::get('login', 'Backend\DashboardController@index')->name('login');
    Route::get('register', 'Backend\DashboardController@register')->name('register');
    Route::post('aksiregister', 'Backend\DashboardController@registerAdmin')->name('aksiregister');
    Route::post('aksilogin', 'Backend\DashboardController@loginAdmin')->name('aksilogin');
});

Route::middleware(['dashboard'])->group(function () {
    Route::get('admin/dashboard', 'Backend\DashboardController@dashboard')->name('admin.dashboard');
    Route::get('logout', 'Backend\DashboardController@logout')->name('logout');

    // Voucher
    Route::group(["prefix" => "voucher"],function() {
        Route::get("/", "Backend\VoucherController@index")->name("voucher");
        Route::post('', "Backend\VoucherController@PostVoucher");
        Route::get("/delete/{v}", "Backend\VoucherController@DeleteVoucher")->name("voucher.delete");
        Route::get('/edit/{v}',"Backend\VoucherController@GetEditVoucher")->name("voucher.edit");
        Route::put('/edit/{v}',"Backend\VoucherController@PutEditVoucer");
        Route::put("/status/{v}", "Backend\VoucherController@PutVoucherStatus")->name("voucher.status");
        Route::put('/gambar/{v}', "Backend\VoucherController@PutVoucherGambar")->name("voucher.gambar");
        Route::get("/redeem","Backend\VoucherController@GetVoucherRedeem")->name("voucher.redeem");
        Route::get('/redeem/konfirmasi/{r}', "Backend\VoucherController@VoucherRedeemKonfirmasi")->name("voucher.redeem.konfirmasi");
    });

    // Product Category
    Route::get('category', 'Backend\CategoryController@index')->name('category');
    Route::post('category', 'Backend\CategoryController@store')->name('category.store');
    Route::post('cari_data_kategori', 'Backend\CategoryController@cari_data_kategori')->name('cari_data_kategori');
    Route::delete('category/{category}', 'Backend\CategoryController@destroy')->name('category.delete');

    // Product Category_OPP_Controller
    Route::get('category_opp', 'Backend\Category_OPP_Controller@index')->name('category_opp');
    Route::post('category_opp', 'Backend\Category_OPP_Controller@store')->name('category_opp.store');
    Route::post('cari_data_kategori_opp', 'Backend\Category_OPP_Controller@cari_data_kategori')->name('cari_data_kategori_opp');
    Route::delete('category_opp/{category}', 'Backend\Category_OPP_Controller@destroy')->name('category_opp.delete');

    // Product
    Route::get('product', 'Backend\ProductController@index')->name('product');
    Route::post('product', 'Backend\ProductController@store')->name('product.store');
    Route::post('cari_data_product', 'Backend\ProductController@cari_data_product')->name('cari_data_product');
    Route::delete('product/{product}', 'Backend\ProductController@destroy')->name('product.delete');
    // Add Product To Vendor Stock
    Route::post('add/product', 'Backend\ProductController@addProductVendor')->name('add-product-vendor');

    //aktivasi product
    Route::post('product/active', 'Backend\ProductController@active')->name('product.active');
    Route::post('product/no_active', 'Backend\ProductController@non_active')->name('product.non_active');
    Route::post('best/active', 'Backend\ProductController@best_active')->name('best.active');
    Route::post('best/no_active', 'Backend\ProductController@best_non_active')->name('best.non_active');
    Route::post('new/active', 'Backend\ProductController@new_active')->name('new.active');
    Route::post('new/no_active', 'Backend\ProductController@new_non_active')->name('new.non_active');
    Route::post('product/usual', 'Backend\ProductController@usual')->name('product.usual');
    Route::post('product/best', 'Backend\ProductController@best')->name('product.best');
    Route::post('product/new', 'Backend\ProductController@new')->name('product.new');

    // Paket Category
    Route::get('package_category', 'Backend\PackageCategoryController@index')->name('package_category');
    Route::post('package_category', 'Backend\PackageCategoryController@store')->name('package_category.store');
    Route::post('cari_kategori_paket', 'Backend\PackageCategoryController@cari_kategori_paket')->name('cari_kategori_paket');
    Route::delete('package_category/{package_category}', 'Backend\PackageCategoryController@destroy')->name('package_category.delete');

    Route::group(["prefix" => "data-vendor"], function() {
        Route::get("", 'Backend\VendorController@index')->name('data_vendor');

        
        //aktivasi data_vendor
        Route::post('active', 'Backend\VendorController@active')->name('data_vendor.active');
        Route::post('no_active', 'Backend\VendorController@non_active')->name('data_vendor.non_active');
        
        Route::get("admin/freelance", 'Backend\FreelanceController@index')->name('freelance_data');
        //aktivasi freelance
        Route::post('freeactive', 'Backend\FreelanceController@active')->name('freelance.active');
        Route::post('freeno_active', 'Backend\FreelanceController@non_active')->name('freelance.non_active');

        // data DU / Gudang / Mitra
        Route::get('gudang', "Backend\VendorController@getDataMitra")->name("data_vendor.gudang");
        Route::post("gudang", "Backend\VendorController@postDataMitra");

    });
    // Vendor

    // Data Costumer
    Route::get('data_costumer', 'Backend\CostumerController@index')->name('data_costumer');
    Route::post('costumer/detail', 'Backend\CostumerController@detailCostumer')->name('detailCostumer');

    // Data Order
    Route::get('data_order', 'Backend\DataOrderController@index')->name('data_order');

    // Data Viewer Katalog
    Route::get('data_katalog', 'Backend\KatalogController@index')->name('data_katalog');

    // Data Viewer Syarat
    Route::get('viwer_syarat', 'Backend\ViewerSyaratController@index')->name('viwer_syarat');

    // Data Ulasan
    Route::get('ulasan', 'Backend\UlasanController@index')->name('ulasan');

    // Data Daftar Mitra
    Route::get('daftar_mitra', 'Backend\DaftarMitraController@index')->name('daftar_mitra');

    // Data Tarik Dana
    Route::get('tarik_dana', 'Backend\TarikDanaController@index')->name('tarik_dana');

    //Data Articel
    Route::get('article', 'Backend\ArtikelController@index')->name('article');
    Route::get('article.create', 'Backend\ArtikelController@create')->name('article.create');
    Route::post('article', 'Backend\ArtikelController@store')->name(
        
        'article.store');
    Route::get('article/{article}', 'Backend\ArtikelController@edit')->name('article.edit');
    Route::put('article/{article}', 'Backend\ArtikelController@update')->name('article.update');
    Route::delete('article/{article}', 'Backend\ArtikelController@destroy')->name('article.delete');
    Route::post('cari_data_article', 'Backend\ArtikelController@cari_data_articel')->name('cari_data_article');

    //Categori Artikel
    Route::get('acat', 'Backend\ArticleCategoryController@category')->name('acat');
    // Route::get('asd', 'Backend\ArticleCa1tegoryController@asd')->name('asd');
    Route::post('article/category', 'Backend\ArticleCategoryController@store')->name('article_category.store');
    Route::delete('articel/category/{category}', 'Backend\ArticleCategoryController@destroy')->name('article_category.delete');
    Route::post('cari_data_category_articel', 'Backend\ArticleCategoryController@cari_data_category_articel')->name('cari_data_category_articel');

    //Data Syarat
    Route::get('syarat', 'Backend\SyaratController@index')->name('syarat');
    Route::get('syarat.create', 'Backend\SyaratController@create')->name('syarat.create');
    Route::post('syarat', 'Backend\SyaratController@store')->name('syarat.store');
    Route::get('syarat/{syarat}', 'Backend\SyaratController@edit')->name('syarat.edit');
    Route::put('syarat/{syarat}', 'Backend\SyaratController@update')->name('syarat.update');
    Route::delete('syarat/{syarat}', 'Backend\SyaratController@destroy')->name('syarat.delete');
    Route::post('cari_data_syarat', 'Backend\SyaratController@cari_data_syarat')->name('cari_data_syarat');

    //Data Testimony
    Route::get('testimony', 'Backend\TestimonyController@index')->name('testimony');
    Route::get('testimony.create', 'Backend\TestimonyController@create')->name('testimony.create');
    Route::post('testimony', 'Backend\TestimonyController@store')->name('testimony.store');
    Route::get('testimony/{testimony}', 'Backend\TestimonyController@edit')->name('testimony.edit');
    Route::put('testimony/{testimony}', 'Backend\TestimonyController@update')->name('testimony.update');
    Route::delete('testimony/{testimony}', 'Backend\TestimonyController@destroy')->name('testimony.delete');
    Route::post('cari_data_testimony', 'Backend\TestimonyController@cari_data_testimony')->name('cari_data_testimony');
    Route::post('testimony.product', 'Backend\TestimonyController@product')->name('testimony.product');
    Route::post('testimony.consument', 'Backend\TestimonyController@consument')->name('testimony.consument');
});
