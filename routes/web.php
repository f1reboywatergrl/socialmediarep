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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    if(Auth::check()){
        return view('index');
    }
    else{
        return view('auth/login');
    }    
});

Route::get('member','SocialController@member');
Route::get('group','SocialController@group');
Route::get('photo','SocialController@photo');
Route::get('profile','SocialController@profile');
Route::get('index', 'SocialController@index');
Route::post('index','SocialController@store');
Route::get('index/{id}/like',['as'=>'post.like','uses'=>'SocialController@post_like']);
Route::get('/index/{id}/edit', 'SocialController@edit_post');
Route::put('/index/{id}/edit', 'SocialController@update_post');
Route::delete('index','SocialController@del_post');
Route::get('profile/edit','SocialController@edit_profile');
Route::put('profile/edit','SocialController@update_profile');
//Route::get('profile/{id}','SocialController@show_profile');
