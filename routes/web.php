<?php

use App\Http\Controllers\DemoTestController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function () {
    // v1 路由
    Route::prefix('v1')->group(function () {
        // 心跳
        Route::get('/heartbeat', [DemoTestController::class, 'heartbeat']);
    });
});
