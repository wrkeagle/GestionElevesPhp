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

Route::get('promos', 'PromoController@index')->name('promos.index');
Route::post('promos', 'PromoController@store')->name('promos.store');
Route::get('promos/create', 'PromoController@create')->name('promos.create');
Route::get('promos/{promo}', 'PromoController@show')->name('promos.show');
Route::put('promos/{promo}', 'PromoController@update')->name('promos.update');
Route::delete('promos/{promo}', 'PromoController@destroy')->name('promos.destroy');
Route::get('promos/{promo}/edit', 'PromoController@edit')->name('promos.edit');

Route::get('eleves', 'EleveController@index')->name('eleves.index');
Route::post('eleves', 'EleveController@store')->name('eleves.store');
Route::get('eleves/create', 'EleveController@create')->name('eleves.create');
Route::get('eleves/{eleve}', 'EleveController@show')->name('eleves.show');
Route::put('eleves/{eleve}', 'EleveController@update')->name('eleves.update');
Route::delete('eleves/{eleve}', 'EleveController@destroy')->name('eleves.destroy');
Route::get('eleves/{eleve}/edit', 'EleveController@edit')->name('eleves.edit');

Route::get('modules', 'ModuleController@index')->name('modules.index');
Route::post('modules', 'ModuleController@store')->name('modules.store');
Route::get('modules/create', 'ModuleController@create')->name('modules.create');
Route::get('modules/{module}', 'ModuleController@show')->name('modules.show');
Route::put('modules/{module}', 'ModuleController@update')->name('modules.update');
Route::delete('modules/{module}', 'ModuleController@destroy')->name('modules.destroy');
Route::get('modules/{module}/edit', 'ModuleController@edit')->name('modules.edit');
