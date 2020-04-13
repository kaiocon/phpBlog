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

Auth::routes(['register' => false]);

Route::get('/', 'BlogPostController@index')->name('/');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/newPost', 'HomeController@newPost')->name('newPost');
Route::get('/deletePost/{blogPost_id}', 'HomeController@deletePost')->name('deletePost');
Route::get('/editPost/{blogPost_id}', 'HomeController@editPost')->name('editPost');
Route::post('/updatePost/{blogPost_id}', 'HomeController@updatePost')->name('updatePost');
Route::post('/search/', 'BlogPostController@searchPost')->name('searchPost');
