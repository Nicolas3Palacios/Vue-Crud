<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\SonController;
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
Route::get('/', [PersonController::class,'index'])->name('person.index');
Route::group(['prefix'=>'/person'],function(){
    Route::name('person.')->group(function(){
    });
});

Route::group(['prefix'=>'/city','controller'=>CityController::class],function(){
    Route::name('city.')->group(function(){
        Route::get('/index','index')->name('index');
        Route::post('/store','store')->name('store');
        Route::delete('/delete/{id}','delete')->name('delete');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');

    });
});

Route::group(['prefix'=>'/son','controller'=>SonController::class],function(){
    Route::name('son.')->group(function(){
        Route::get('/index','index')->name('index');
        Route::post('/store','store')->name('store');
        Route::delete('/delete/{id}','delete')->name('delete');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');

    });
});

Route::group(['prefix'=>'/person','controller'=>PersonController::class],function(){
    Route::name('person.')->group(function(){
        Route::post('/store','store')->name('store');
        Route::delete('/delete/{id}','delete')->name('delete');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');

    });
});

Route::get('/Api', function () {
    return view('rick&morti.index');
});
