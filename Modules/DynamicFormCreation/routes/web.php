<?php

use Illuminate\Support\Facades\Route;
use Modules\DynamicFormCreation\App\Http\Controllers\DynamicFormCreationController;
use Modules\DynamicFormCreation\App\Http\Controllers\DashboardController;
use Modules\DynamicFormCreation\App\Http\Controllers\FieldsController;
use Modules\DynamicFormCreation\App\Http\Controllers\ProfileController;
use Modules\DynamicFormCreation\App\Http\Controllers\CategoryController;
use Modules\DynamicFormCreation\App\Http\Controllers\FormTemplateController;
use Modules\DynamicFormCreation\App\Http\Controllers\OrganizationController;
use Modules\DynamicFormCreation\App\Http\Controllers\FormSubmissionController;

Route::middleware('auth')->prefix('form-builder')->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('form_builder.dashboard');

    Route::middleware(['auth', 'role:admin'])->group(function () {

        Route::resource('organization', OrganizationController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('form-templates', FormTemplateController::class);
        Route::resource('fields', FieldsController::class);

    });

    Route::get('form/submit/{id}', [FormSubmissionController::class, 'showForm'])->name('form.create');
    Route::post('form/{formTemplateId}/submit', [FormSubmissionController::class, 'submitForm'])->name('form.store');

    Route::get('/submitted-data', [FormSubmissionController::class, 'AllSubmittedData'])->name('all.submitted.data');
    Route::get('/forms', [FormTemplateController::class, 'forms'])->name('forms.index');

});
