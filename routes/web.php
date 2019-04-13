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

// Route::get('/', function () {
//     return view('welcome');
// });



/*Route::prefix('admin',)->group(function () {
    Route::resource('comment', 'CommentController');
    Route::resource('content', 'ContentController');
    Route::resource('content-category', 'ContentCategoryController');
    Route::resource('sub-content-category', 'SubContentCategoryController');
    Route::resource('user', 'UserController');
});*/
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function () {
    Route::get('','mainController@getAdmin')->name('admin');
    Route::resource('comment', 'CommentController');
    Route::resource('content', 'ContentController');
    Route::resource('content-category', 'ContentCategoryController');
    Route::resource('sub-content-category', 'SubContentCategoryController');
    Route::resource('user', 'UserController');
});

Route::get('','mainController@getTrangChu')->name('home');
Route::get('/{alias}/{id}','mainController@getPageDetail')->name('pagedetail');

Route::get('dangnhap','xuLyAuthController@getLogin')->name('login');
Route::post('dangnhap','xuLyAuthController@postLogin')->name('postlogin');
Route::get('dangxuat','xuLyAuthController@logout')->name('logout');
Route::post('checkname','xuLyAuthController@checkName');

Route::get('dangky','xuLyAuthController@getRegister')->name('register');
Route::post('dangky','xuLyAuthController@postRegister')->name('postregister');
Route::post('uploadPhoto','UploadPhotoController@storageImage')->name('uploadPhoto');
Route::post('post-comment', 'mainController@postComment')->name('postComment');
Route::get('concept', function(){
    return view('frontend-concept.app-concept');
});
Route::get('about','mainController@getGioiThieu')->name('gioithieu');

Route::any('{any}', function () {
    return redirect()->url('/');
});
