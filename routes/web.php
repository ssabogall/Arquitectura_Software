<?php
# This file is part of the Laravel course project.
# aqui solo deberias agregar las rutas que necesites para tu proyecto y seguir con la misma estructura de las rutas
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PilotController;

// Ruta home
Route::get('/', [HomeController::class, 'index'])->name('home.index');
// Rutas que necesitas agregar
Route::get('/about', function () { 
    $data1 = "About us - Online Store";  
    $data2 = "About us";                
    $description = "This is an about page ...";
    $author = "Developed by: Your Name";
    return view('home.about')
        ->with("title", $data1)
        ->with("subtitle", $data2)
        ->with("description", $description)
        ->with("author", $author);
})->name("home.about");
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
// Rutas de productos
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("product.index");
Route::get('/products/create', 'App\Http\Controllers\ProductController@create')->name("product.create");
Route::post('/products/save', 'App\Http\Controllers\ProductController@save')->name("product.save");
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name("product.show");
Route::post('/products/{id}/comments', 'App\Http\Controllers\ProductController@saveComment')->name('product.saveComment');
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");
Route::get('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add");
Route::get('/cart/removeAll/', 'App\Http\Controllers\CartController@removeAll')->name("cart.removeAll");
Route::get('/image', 'App\Http\Controllers\ImageController@index')->name("image.index");
Route::post('/image/save', 'App\Http\Controllers\ImageController@save')->name("image.save");
Route::get('/image-not-di', 'App\Http\Controllers\ImageNotDIController@index')->name("imagenotdi.index");
Route::post('/image-not-di/save', 'App\Http\Controllers\ImageNotDIController@save')->name("imagenotdi.save");
//Parcial_1 Rutas de pilotos
Route::get('/pilots', [PilotController::class, 'index'])->name('pilots.index');
Route::get('/pilots/create', [PilotController::class, 'create'])->name('pilots.create');
Route::post('/pilots', [PilotController::class, 'store'])->name('pilots.store');
Route::get('/pilots/statistics', [PilotController::class, 'statistics'])->name('pilots.statistics');
Auth::routes();
