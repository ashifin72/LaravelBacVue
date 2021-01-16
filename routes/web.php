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

  Route::get('/', function () {
    return view('welcome');
  });

  Auth::routes();


  Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


  Route::middleware(['auth'])->group(function (){
    $groupData = ['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'];
    Route::group($groupData, function () {
      Route::middleware(['auth'])->group(function () {
        Route::get('/', 'HomeController@index')->name('admin.index');
        Route::resource('products', 'ProductController')
          ->except('show')
          ->names('admin.products');
        Route::resource('product-categories', 'ProductCategoryController')
          ->except('show')
          ->names('admin.product_categories');
      });
    });
  });

//  $slug = 'about'?? 'page' ?? 'cart';
//  Route::get('/{vue_capture?}', function () {
//    return view('app');
//  })->where('vue_capture', $slug);

//   Route::get('/', function() {
//    return view('app');
//  });
