<?php

use Illuminate\Support\Facades\Route;

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
Route::get('shop.product', 'HomeController@product')->name('shop.product');
Route::get('detail_product/{product_id}', 'HomeController@detail_product')->name('detail_product');
Route::get('about', 'HomeController@about')->name('about');
Route::get('partnership', 'HomeController@partnership')->name('partnership');
Route::get('contact', 'HomeController@contact')->name('contact');
Route::get('blog/{articel}', 'HomeController@articel')->name('blog');
Route::get('testimon/{testimony}', 'HomeController@testimony')->name('testimon');

Route::middleware(['vendor'])->group(function () {
    Route::get('vendor', 'Frontend\DashboardController@index')->name('vendor');
    Route::get('register_vendor', 'Frontend\DashboardController@register')->name('register_vendor');
    Route::post('aksiregister_vendor', 'Frontend\DashboardController@registerAdmin')->name('aksiregister_vendor');
    Route::post('aksilogin_vendor', 'Frontend\DashboardController@loginAdmin')->name('aksilogin_vendor');
});

Route::middleware(['vendor.dashboard'])->group(function () {
    Route::group(["middleware" => "cek_profile"],function() {
        Route::get('vendor/dashboard', 'Frontend\DashboardController@dashboard')->name('vendor.dashboard');
        Route::get('stock', 'Frontend\StockController@index')->name('stock');
        Route::post('stock/update', 'Frontend\StockController@update')->name('stock.update');
    });
    // cari kota
    Route::post('carikota', 'Frontend\DashboardController@carikota');
    Route::get('vendor.logout', 'Frontend\DashboardController@logout')->name('vendor.logout');
    // Stock Product Vendor
});

Route::group(["prefix" => "profile"],function() {
    Route::get("", "Backend\ProfileController@GetUpdateProfile")->name("vendor.update.profile");
    Route::put("", "Backend\ProfileController@PutUpdateProfile");
});


// BACKEND
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

    // Vendor
    Route::get('data_vendor', 'Backend\VendorController@index')->name('data_vendor');
    //aktivasi data_vendor
    Route::post('data_vendor/active', 'Backend\VendorController@active')->name('data_vendor.active');
    Route::post('data_vendor/no_active', 'Backend\VendorController@non_active')->name('data_vendor.non_active');

    //Data Articel
    Route::get('articel', 'Backend\ArtikelController@index')->name('articel');
    Route::get('articel.create', 'Backend\ArtikelController@create')->name('articel.create');
    Route::post('articel', 'Backend\ArtikelController@store')->name('articel.store');
    Route::get('articel/{articel}', 'Backend\ArtikelController@edit')->name('articel.edit');
    Route::put('articel/{articel}', 'Backend\ArtikelController@update')->name('articel.update');
    Route::delete('articel/{articel}', 'Backend\ArtikelController@destroy')->name('articel.delete');
    Route::post('cari_data_articel', 'Backend\ArtikelController@cari_data_articel')->name('cari_data_articel');

    //Data Articel
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
