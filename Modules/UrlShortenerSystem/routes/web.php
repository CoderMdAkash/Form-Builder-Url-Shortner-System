<?php

use Illuminate\Support\Facades\Route;
use Modules\UrlShortenerSystem\App\Http\Controllers\UrlController;
use Modules\UrlShortenerSystem\App\Http\Controllers\UrlShortenerSystemController;
use Modules\UrlShortenerSystem\App\Http\Controllers\DashboardController;

Route::middleware('auth')->prefix('url-shortner')->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('url_shortner.dashboard');

    Route::resource('urls', UrlShortenerSystemController::class)->names('urls');
});


// public url 
Route::get('/short/{shortener_url}', [UrlShortenerSystemController::class, 'shortenLink'])->name('shortener-url');
