<?php

use Illuminate\Support\Facades\Route;
use Modules\UrlShortenerSystem\App\Http\Controllers\UrlShortenerSystemController;
use Modules\UrlShortenerSystem\App\Http\Controllers\DashboardController;

Route::middleware('auth')->group(function () {

    Route::get('url-shortner/dashboard', [DashboardController::class, 'index'])->name('url_shortner.dashboard');

    Route::resource('urlshortenersystem', UrlShortenerSystemController::class)->names('urlshortenersystem');
});
