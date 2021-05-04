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
Route::get('about', 'HomeController@about')->name('about');
Route::get('partnership', 'HomeController@partnership')->name('partnership');
Route::get('contact', 'HomeController@contact')->name('contact');

Route::middleware(['vendor'])->group(function () {
    Route::get('vendor', 'Frontend\DashboardController@index')->name('vendor');
    Route::get('register_vendor', 'Frontend\DashboardController@register')->name('register_vendor');
    Route::post('aksiregister_vendor', 'Frontend\DashboardController@registerAdmin')->name('aksiregister_vendor');
    Route::post('aksilogin_vendor', 'Frontend\DashboardController@loginAdmin')->name('aksilogin_vendor');
});
Route::middleware(['vendor.dashboard'])->group(function () {
    Route::get('vendor.dashboard', 'Frontend\DashboardController@dashboard')->name('vendor.dashboard');
    Route::get('vendor.logout', 'Frontend\DashboardController@logout')->name('vendor.logout');
});

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

    // Paket Category
    Route::get('package_category', 'Backend\PackageCategoryController@index')->name('package_category');
    Route::post('package_category', 'Backend\PackageCategoryController@store')->name('package_category.store');
    Route::post('cari_kategori_paket', 'Backend\PackageCategoryController@cari_kategori_paket')->name('cari_kategori_paket');
    Route::delete('package_category/{package_category}', 'Backend\PackageCategoryController@destroy')->name('package_category.delete');

    // Vendor
    Route::get('data_vendor', 'Backend\VendorController@index')->name('data_vendor');
    Route::post('data_vendor', 'Backend\VendorController@store')->name('data_vendor.store');
    Route::post('cari_data_data_vendor', 'Backend\VendorController@cari_data_data_vendor')->name('cari_data_data_vendor');
    Route::delete('data_vendor/{data_vendor}', 'Backend\VendorController@destroy')->name('data_vendor.delete');
    //aktivasi data_vendor
    Route::post('data_vendor/active', 'Backend\VendorController@active')->name('data_vendor.active');
    Route::post('data_vendor/no_active', 'Backend\VendorController@non_active')->name('data_vendor.non_active');
});