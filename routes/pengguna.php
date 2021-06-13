<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Website Routes
|--------------------------------------------------------------------------
*/

Auth::routes(['verify' => 'true']);
Route::prefix('app')->middleware('auth')->group(function () {
    
});
