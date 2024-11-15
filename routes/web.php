<?php

use App\Http\Controllers\DemoTestController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function () {
    Route::get('/heartbeat', [DemoTestController::class, 'heartbeat']);
});
