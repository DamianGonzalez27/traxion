<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * Rutas
 */
Route::post('url', [\App\Http\Controllers\UrlController::class, 'postUrl']);
Route::get('url/{hash}', [\App\Http\Controllers\UrlController::class, 'getUrl']);
