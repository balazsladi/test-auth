<?php

use App\Http\Controllers\Api\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('{driver}', [AuthenticationController::class, 'socialLogin'])
        ->where('driver', '(google|facebook|apple)');

});