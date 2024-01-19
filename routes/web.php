<?php

use App\Http\Controllers\BantuanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UIController;
use Illuminate\Support\Facades\Route;

Route::controller(UIController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('cari', 'cari1');
    Route::get('produk-all', 'all');
    Route::get('produk-all/cari', 'cari2');
    Route::get('produk/{id}', 'detail');
    Route::get('bantuan','bantu');
});

Auth::routes();
Route::resource('/admin/dashboard', HomeController::class);
Route::resource('/admin/carousel', CarouselController::class);
Route::resource('/admin/kategori', KategoriController::class);
Route::resource('/admin/produk', ProdukController::class);
Route::resource('/admin/setting', SettingController::class);
Route::controller(BantuanController::class)->group(function () {
    Route::get      ('/admin/bantuan',                      'index');
    Route::post     ('admin/bantuan/kategori/create',       'create1');
    Route::post     ('admin/bantuan/bantu/create',          'create2');
    Route::put     ('admin/bantuan/kategori/update/{id}',  'update1');
    Route::put     ('admin/bantuan/bantu/update/{id}',     'update2');
    Route::delete   ('admin/bantuan/kategori/{id}',         'destroy1');
    Route::delete   ('admin/bantuan/bantu/{id}',            'destroy2');
});
