<?php

use App\Http\Controllers\API\InformationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/LoginPage',[InformationController::class,'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
