<?php

use Aiman\ThaanaTinymceField\Http\Controllers\ImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. You're free to add
| as many additional routes to this file as your tool may require.
|
*/

Route::post('save-image', [ImageController::class, 'saveImage']);
Route::post('save-image-in-cloud', [ImageController::class, 'saveImageInCloud']);
