<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

Route::get('search_data',[App\Http\Controllers\FormController::class,'search_data']);
Route::get('/', function () {
    return view('welcome');
});


Route::controller(ProductController::class)->group(function(){
    Route::get('/products','index')->name('products.index');
    Route::get('/products/create','create')->name('products.create');
    Route::post('/products','store')->name('products.store');
    Route::get('/products/{product}/edit','edit')->name('products.edit');
    Route::put('/products/{product}','update')->name('products.update');
    Route::delete('/products/{product}','destroy')->name('products.destroy');
    route::get('search_data', [FormController::class, 'search_data']);
});
