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
// authenticate routes
Route::get('auth/login', 'Auth\LoginController@getLogin');
Route::post('auth/login','Auth\LoginController@postLogin');
Route::get('auth/logout', 'Auth\LoginController@getLogout');
// register user routes

Route::get('auth/register','Auth\RegisterController@getRegister');
Route::post('auth/register','Auth\RegisterController@postRegister');



Route::get('blog/{slugs}',['as'=>'blog.single', 'uses'=>'BlogController@getSingle'])->where('slugs','[\w\d\-\_]+');
Route::get('blog',['uses'=>'BlogController@getIndex', 'as'=>'blog.index']);
Route::get('contact', 'PagesController@getcontact');
Route::get('about', 'PagesController@getabout');
Route::get('/', 'PagesController@getIndex');
Route::resource('posts','PostController');



