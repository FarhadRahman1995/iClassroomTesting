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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/classroom', 'ClassRoomController@index')->name('classroom.index');
Route::post('/classroom', 'ClassRoomController@store')->name('classroom.store');
Route::get('/classroom/{slug}', 'ClassRoomController@show')->name('classroom.index');
Route::get('/classroom/post', 'PostController@show')->name('post.create');


Route::post('/classroom-add', 'ClassRoomController@addToClassRoom')->name('classroom.add');

Route::get('/classroom-request/{id}', 'ClassRoomController@requestToClassRoom')->name('classroom.request');

Route::get('/classroom-delete/{id}', 'ClassRoomController@deleteToClassRoom')->name('classroom.delete');

Route::get('/post/create', 'PostController@create')->name('post.create');
Route::post('/post/store', 'PostController@store')->name('post.store');

Route::post('/comment/store', 'CommentController@store')->name('comment.add');


Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');

Route::resource('files', 'FileController');
Route::get('files/{uuid}/download', 'FileController@download')->name('file.download');

