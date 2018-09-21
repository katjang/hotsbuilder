<?php

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

Route::get('/', 'PagesController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/heroes', 'HeroesController@index')->name('heroes');
Route::get('/heroes/{hero}', 'BuildsController@index')->name('hero.builds');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/heroes/{hero}/create', 'BuildsController@create')->name('build.create');
});


Route::get('/builds', 'UserBuildsController@index')->name('builds');
Route::post('/builds', 'UserBuildsController@store')->name('build.store');
Route::delete('/builds/{build}', 'UserBuildsController@delete')->name('build.delete');
Route::put('/builds/{build}', 'UserBuildsController@update')->name('build.update');
