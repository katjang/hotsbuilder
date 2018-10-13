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
Route::get('/heroes/{hero}', 'HeroesController@show')->name('hero.show');

Route::get('/users/{user}', 'UserController@show')->name('user.show');

Route::get('/maps', 'MapsController@index')->name('maps');

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/heroes/{hero}/create', 'BuildsController@create')->name('build.create');
    Route::get('builds/{build}/edit', "BuildsController@edit")->name('build.edit');

    Route::get('/builds', 'UserBuildsController@index')->name('user.builds');
    Route::put('/builds/{build}', 'UserBuildsController@update')->name('user.build.update');
    Route::post('/builds', 'UserBuildsController@store')->name('user.build.store');
    Route::delete('/builds/{build}', 'UserBuildsController@delete')->name('user.build.delete');

    Route::get('/favorites', 'UserFavoritesController@index')->name('user.favorites');
    Route::post('/builds/{build}/favorite', 'UserFavoritesController@store')->name('user.favorite.store');
    Route::delete('/builds/{build}/favorite', 'UserFavoritesController@delete')->name('user.favorite.delete');
});

Route::group(['prefix' => 'admin'], function()
{
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login.form');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login');

    Route::group(['middleware' => 'auth:admin'], function()
    {
        Route::get('/users', 'Admin\UserController@index')->name('admin.users');
    });
});
