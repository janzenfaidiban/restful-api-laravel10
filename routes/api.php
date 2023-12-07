<?php

use Illuminate\Support\Facades\Route;

//posts
Route::apiResource('/posts', App\Http\Controllers\Api\PostController::class);

//events
Route::apiResource('/events', App\Http\Controllers\Api\EventController::class);