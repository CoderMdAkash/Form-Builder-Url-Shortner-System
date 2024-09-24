<?php

use Illuminate\Support\Facades\Route;
use Modules\DynamicFormCreation\App\Http\Controllers\DynamicFormCreationController;

Route::group([], function () {
    Route::resource('dynamicformcreation', DynamicFormCreationController::class)->names('dynamicformcreation');
});
