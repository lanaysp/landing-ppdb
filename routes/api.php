<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('admin')->group(function () {
    Route::get('news-analytic/{id}', 'Api\ApiBackendController@pengunjungNews');
    Route::get('dashboard/{any}', 'Api\ApiBackendController@adminDashboard');
});

Route::prefix('meeting')->group(function () {
    Route::get('data', 'Pengguna\MeetingRoomController@calendarMeetApi');
    Route::get('ppdb','Pengguna\MeetingRoomController@calendarMeetApiUser');
});
