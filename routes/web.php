<?php
use Illuminate\Support\Facades\Route;

//Home
Route::get('/', 'FEHomeController@index')->name('fe.home');
//Detail
Route::get('/{id}-{slug}.html', 'FEPostController@detail')->name('fe.baiviet.detail');
//Comment
Route::post('/comment', 'FECommentController@saveComment')->name('fe.comment.save');
//Search
Route::get('/search', 'FEPostController@search')->name('fe.search');


//Route cho static page
//1. About
Route::get('/gioi-thieu', 'FEStaticPageController@about')->name('fe.about');
Route::get('/lien-he', 'FEStaticPageController@contact')->name('fe.contact');



//File manager
Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
