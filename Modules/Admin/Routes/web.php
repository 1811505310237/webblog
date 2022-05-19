<?php
use Illuminate\Support\Facades\Route;


//Đăng nhập, Đăng xuất
Route::get('login', 'AdminLoginController@getLogin')->name('admin.login.getLogin');
Route::post('login', 'AdminLoginController@postLogin')->name('admin.login.postLogin');
Route::get('logout', 'AdminLoginController@logout')->name('admin.logout');

//Admin
Route::prefix('adminn')->middleware('CheckLoginAdmin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    //Route cho danh mục
    Route::prefix('danhmuc')->group(function () {
        //Index
        Route::get('/', 'AdminDanhMucController@index')->name('admin.danhmuc.index');

        //Create
        Route::get('/create', 'AdminDanhMucController@create')->name('admin.danhmuc.create');
        Route::post('/create', 'AdminDanhMucController@store')->name('admin.danhmuc.store');

        //Edit
        Route::get('/edit/{id}', 'AdminDanhMucController@edit')->name('admin.danhmuc.edit');
        Route::post('/edit', 'AdminDanhMucController@update')->name('admin.danhmuc.update');

        //Delete
        Route::post('/delete','AdminDanhMucController@delete')->name('admin.danhmuc.delete');
    });

    //Route cho bài viết
    Route::prefix('baiviet')->group(function () {
        //Index
        Route::get('/', 'AdminBaiVietController@index')->name('admin.baiviet.index');

        //Create
        Route::get('/create', 'AdminBaiVietController@create')->name('admin.baiviet.create');
        Route::post('/create', 'AdminBaiVietController@store')->name('admin.baiviet.store');

        //Edit
        Route::get('/edit/{id}', 'AdminBaiVietController@edit')->name('admin.baiviet.edit');
        Route::post('/edit', 'AdminBaiVietController@update')->name('admin.baiviet.update');

        //Delete
        Route::post('/delete','AdminBaiVietController@delete')->name('admin.baiviet.delete');
    });

    //Route cho comment
    Route::prefix('comment')->group(function () {
        //index
        Route::get('/','AdminCommentController@index')->name('admin.comment.index');
        //delete
        Route::post('/delete','AdminCommentController@delete')->name('admin.comment.delete');
        //change
        Route::post('/change','AdminCommentController@changeStatus')->name('admin.comment.change');
    });
    
    //Route cho profile
    Route::prefix('profile')->group(function () {
        //index
        Route::get('/','AdminProfileController@index')->name('admin.profile.index');
        //update
        Route::post('/','AdminProfileController@update')->name('admin.profile.update');
    });

    //Route cho trang tĩnh
    Route::prefix('static')->group(function () {
        //Index
        Route::get('/', 'AdminStaticPageController@index')->name('admin.static.index');

        //Create
        Route::get('/create', 'AdminStaticPageController@create')->name('admin.static.create');
        Route::post('/create', 'AdminStaticPageController@store')->name('admin.static.store');

        //Edit
        Route::get('/edit/{id}', 'AdminStaticPageController@edit')->name('admin.static.edit');
        Route::post('/edit', 'AdminStaticPageController@update')->name('admin.static.update');

        //Delete
        Route::post('/delete','AdminStaticPageController@delete')->name('admin.static.delete');
    });

    //Route cho IP
    Route::prefix('ip')->group(function () {
        //Index
        Route::get('/', 'AdminIPController@index')->name('admin.ip.index');

    });

});

