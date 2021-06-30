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
Route::get('shop/product', 'HomeController@product')->name('shop.product');
Route::get('detail-product/{product_id}', 'HomeController@detail_product')->name('detail_product');
Route::get('about', 'HomeController@about')->name('about');
Route::get('partnership', 'HomeController@partnership')->name('partnership');
Route::get('syarat-mitra', 'HomeController@syarat_mitra')->name('syarat_mitra');
Route::get('contact', 'HomeController@contact')->name('contact');
Route::get('blog/{articel}', 'HomeController@articel')->name('blog');
Route::get('testimon/{testimony}', 'HomeController@testimony')->name('testimon');

// Filter Kategori
Route::post('filter.kategori/{category_id}', 'HomeController@kategori')->name('filter.kategori');

//login mitra
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
    Route::group(["middleware" => "GudangTidakLogin"],function() {
        Route::get('login', 'Gudang\GudangController@getLogin')->name("gudang.login");
        Route::post("login", "Gudang\GudangController@postLogin");
    });

    Route::group(["middleware" => "GudangLogin"],function() {
        Route::get('', 'Gudang\GudangController@index')->name('gudang.dashboard');
        Route::get('profile', 'Gudang\GudangController@profile')->name('gudang.profile');
        Route::get('stock', 'Gudang\GudangController@stock')->name('gudang.stock');
        Route::get('mitra', 'Gudang\GudangController@mitra')->name('gudang.mitra');
        Route::get('ro', 'Gudang\GudangController@ro')->name('gudang.ro');
        Route::get('orderan', 'Gudang\GudangController@orderan')->name('gudang.orderan');
        Route::get('sale', 'Gudang\GudangController@sale')->name('gudang.sale');
        Route::get('best_seller', 'Gudang\GudangController@best_seller')->name('gudang.best_seller');
        Route::get('profit', 'Gudang\GudangController@profit')->name('gudang.profit');
        Route::get('history', 'Gudang\GudangController@history')->name('gudang.history');
        Route::get('laporan', 'Gudang\GudangController@laporan')->name('gudang.laporan');
        Route::get('setting', 'Gudang\GudangController@setting')->name('gudang.setting');

        // profile
        Route::put('/update-profile', "Gudang\GudangController@UpdateProfile")->name("gudang.update_profile");
        Route::put('/update-password', "Gudang\GudangController@UpdatePassword")->name("gudang.update_password");
        Route::put('/update-foto', "Gudang\GudangController@UpdateFoto")->name("gudang.update_foto");

        Route::get("logout",function() {
            Session::flush();
            return redirect()->route("gudang.login");
        });
    });
});

//Costumer Auth
Route::get('user/login', 'Frontend\CostumerController@index')->name('user.login');
Route::get('user/register', 'Frontend\CostumerController@register')->name('user.register');
Route::post('user/aksiregister', 'Frontend\CostumerController@registerAdmin')->name('user.aksiregister');
Route::post('user/aksilogin', 'Frontend\CostumerController@loginAdmin')->name('user.aksilogin');
Route::post('carikotauser', 'Frontend\CostumerController@carikota')->name('carikota');

// COSTUMER DAFTAR DENGAN KODE REFERAL
Route::get('user/register/referal/{referal}', 'Frontend\CostumerController@register')->name("register.user.referal");

// cari kota
Route::post('carikota', 'Frontend\DashboardController@carikota')->name('carikota');

// USER SUDAH LOGIN
Route::middleware(['user.login'])->group(function () {
    Route::get('user.profile', 'Frontend\CostumerController@profile')->name('user.profile');
    Route::get('user.logout', 'Frontend\CostumerController@logout')->name('user.logout');
    Route::get('home', 'HomeController@index')->name('home.again');
    Route::post('/add_to_cart/{product_id}', 'Frontend\CartController@store')->name('add_to_cart');
    Route::get('/cart', 'Frontend\CartController@show')->name('cart');
    Route::delete('cart', 'Frontend\CartController@destroy')->name('cart.delete');
    Route::post('checkout', 'Frontend\CartController@checkout')->name('checkout');
    Route::post('/checkout-fix', 'Customer\CheckoutController@checkout')->name("checkout.fix");
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
    Route::group(["middleware" => "cek_profile"],function() {
        Route::get('vendor/dashboard', 'Frontend\DashboardController@dashboard')->name('vendor.dashboard');
        // Stock
        Route::get('stock', 'Frontend\StockController@index')->name('stock');
        Route::post('stock/update', 'Frontend\StockController@update')->name('stock.update');
        // Order
        Route::get('vendor/order', 'Vendor\OrderController@index')->name('vendor.order');
        Route::get('vendor/order/details/{order_id}', 'Vendor\OrderController@detail_order')->name('vendor.order.details');
        Route::get("vendor/order/update-status/{order}",'Vendor\OrderController@update_status')->name("vendor.order.update.status");
        //deposit
        Route::get('vendor.deposit', 'Vendor\DepositController@index')->name('vendor.deposit');
    });
    Route::get('vendor.logout', 'Frontend\DashboardController@logout')->name('vendor.logout');
    // Stock Product Vendor
});

//Profile Vendor
Route::group(["prefix" => "profile"],function() {
    Route::get("", "Backend\ProfileController@GetUpdateProfile")->name("vendor.update.profile");
    Route::put("", "Backend\ProfileController@PutUpdateProfile");
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
    Route::get('admin.dashboard', 'Backend\DashboardController@dashboard')->name('admin.dashboard');
    Route::get('logout', 'Backend\DashboardController@logout')->name('logout');

    // Product Category
    Route::get('category', 'Backend\CategoryController@index')->name('category');
    Route::post('category', 'Backend\CategoryController@store')->name('category.store');
    Route::post('cari_data_kategori', 'Backend\CategoryController@cari_data_kategori')->name('cari_data_kategori');
    Route::delete('category/{category}', 'Backend\CategoryController@destroy')->name('category.delete');

    // Product
    Route::get('product', 'Backend\ProductController@index')->name('product');
    Route::post('product', 'Backend\ProductController@store')->name('product.store');
    Route::post('cari_data_product', 'Backend\ProductController@cari_data_product')->name('cari_data_product');
    Route::delete('product/{product}', 'Backend\ProductController@destroy')->name('product.delete');

    //aktivasi product
    Route::post('product/active', 'Backend\ProductController@active')->name('product.active');
    Route::post('product/no_active', 'Backend\ProductController@non_active')->name('product.non_active');
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

        // data DU / Gudang / Mitra
        Route::get('gudang', "Backend\VendorController@getDataMitra")->name("data_vendor.gudang");
        Route::post("gudang", "Backend\VendorController@postDataMitra");

    });
    // Vendor

    //Data Articel
    Route::get('articel', 'Backend\ArtikelController@index')->name('articel');
    Route::get('articel.create', 'Backend\ArtikelController@create')->name('articel.create');
    Route::post('articel', 'Backend\ArtikelController@store')->name('articel.store');
    Route::get('articel/{articel}', 'Backend\ArtikelController@edit')->name('articel.edit');
    Route::put('articel/{articel}', 'Backend\ArtikelController@update')->name('articel.update');
    Route::delete('articel/{articel}', 'Backend\ArtikelController@destroy')->name('articel.delete');
    Route::post('cari_data_articel', 'Backend\ArtikelController@cari_data_articel')->name('cari_data_articel');

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
