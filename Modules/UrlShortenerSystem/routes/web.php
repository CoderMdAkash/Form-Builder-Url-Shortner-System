<?php

use Illuminate\Support\Facades\Route;
use Modules\UrlShortenerSystem\App\Http\Controllers\UrlShortenerSystemController;

Route::group([], function () {
    Route::resource('urlshortenersystem', UrlShortenerSystemController::class)->names('urlshortenersystem');
});
