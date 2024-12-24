<?php

use Illuminate\Support\Facades\Route;

Route::name("api.")->prefix('api')->group(function () {
    Route::apiResource('users', App\Http\Controllers\UserController::class, ['only' => ['index', 'store']]);
});
