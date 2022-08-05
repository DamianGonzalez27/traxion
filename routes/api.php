<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('postUrl', [\App\Http\Controllers\UrlController::class, 'postUrl']);
Route::get('getUrl/{hash}', [\App\Http\Controllers\UrlController::class, 'getUrl']);
