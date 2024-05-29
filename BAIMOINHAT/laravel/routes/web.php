<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::METHOD('URL', ACTION) CÚ PHÁP
Route::get( //get là METHOD
    '/home', //URL
    function(){
        $html="<h1>welcome to qung ninh</h1>"; //ACTION
        return $html;
    }
);

Route::get('/greeting', function () {
    return view('greeting',['name'=>'bảo']);
});

Route::group(['prefix'=>'admin'], function(){
    Route::group(['prefix'=>'product'], function(){
        // Định nghĩa các route cho product ở đây
        Route::get('/getProducts', 
        'admin.product.getProducts');

        Route::get('/getProductByBand', 
        'App\Http\Controllers\ProductController@getProductByBand')
        ->name('admin.product.getProductByBand');

        Route::get('/getProductByYear', 
        'App\Http\Controllers\ProductController@getProductByYear')
        ->name('admin.product.getProductByYear');
        
        Route::post('insertProduct', 
        'App\Http\Controllers\ProductController@insertProduct');
        Route::post('deleteProduct', 
        'App\Http\Controllers\ProductController@deleteProduct');
        Route::post('updateProduct', 
        'App\Http\Controllers\ProductController@updateProduct');
    });

    Route::group(['prefix'=>'customer'], function(){
        // Định nghĩa các route cho customer ở đây
        Route::get('/customer', 
        'App\Http\Controllers\CustomerController@index');
        
    });

    Route::group(['prefix'=>'order'], function(){
        // Định nghĩa các route cho order ở đây
        Route::get('/order', 
        'App\Http\Controllers\OrderController@index');
        
    });

    Route::group(['prefix'=>'orderdetal'], function(){
        // Định nghĩa các route cho orderdetal ở đây
        Route::get('/orderdetal', 
        'App\Http\Controllers\OrderDetalController@index');
        
    });
});