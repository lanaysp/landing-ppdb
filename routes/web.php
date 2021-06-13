<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Website Routes
|--------------------------------------------------------------------------
*/

Auth::routes(['verify' => 'true']);
// Home Page

Route::get('/', 'WebsiteController@index')->name('home');
Route::get('/laman/{id}/{any}', 'WebsiteController@pageLaman')->name('page.builder');
Route::post('/subcribe', 'WebsiteController@subcriber')->name('subcribe');

// Page Route
Route::prefix('page')->group(function () {
    Route::get('/vission', 'WebsiteController@about')->name('vission');
    Route::get('/gallery', 'WebsiteController@gallery')->name('gallery');
    Route::get('/contact', 'WebsiteController@contact')->name('contact');
    Route::post('/send', 'WebsiteController@contactInsert')->name('contact.send');
    Route::get('/facility', 'WebsiteController@facilityWeb')->name('web.facility');
    Route::get('/mapel', 'WebsiteController@mapelPage')->name('page.mapel');
});

Route::prefix('teacher')->group(function () {
    Route::get('list', 'WebsiteController@teacherList')->name('teacher.web');
    Route::get('detail-teacher/{id}/{name}', 'WebsiteController@teacherDetail')->name('web.teacher.detail');
});

Route::prefix('academic')->group(function () {
    Route::get('list-extrakulikuler', 'WebsiteController@extra_web')->name('web.extra');
    Route::get('detail-extrakulikuler/{id}/{name}', 'WebsiteController@extraDetail')->name('web.detail.extra');
    Route::get('archivement', 'WebsiteController@prestasiList')->name('web.archivement');
    Route::get('archivement-detail/{id}/{name}', 'WebsiteController@prestasiDetail')->name('web.detail.archivement');
});

// Events Route
Route::prefix('event')->group(function () {
    Route::get('/{any}', 'WebsiteController@events')->name('event.list');
    Route::get('/{any}/{id}/{name}', 'WebsiteController@events')->name('event.detail');
    Route::get('/by/{any}/{id}/{name}', 'WebsiteController@events')->name('events.bycategory');
});

// News Route
Route::prefix('news')->group(function () {
    Route::get('/{any}', 'WebsiteController@news')->name('news.index');
    Route::get('/{any}/{id}/{name}', 'WebsiteController@news')->name('news.detail');
    Route::get('/by/{any}/{id}', 'WebsiteController@news')->name('news.bycategory');
});

Route::prefix('auth')->group(function () {
    // Forget Pass
    Route::get('/forget', 'UsersController@forgetpass')->name('web.forget');
    Route::post('/forget-send', 'UsersController@forget_send')->name('web.forgetsend');
    Route::post('change-password', 'UsersController@update_password')->name('change.password');
});
