<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("check-referal", "Frontend\CostumerController@CheckReferal");
Route::get('/get-vendor-dalam-kota', "Customer\CheckoutController@checkoutTahap1");
Route::get('/cek-ongkir', "Customer\CheckoutController@checkOngkir");
Route::get('/filter-kategori', 'HomeController@filterKategori');
