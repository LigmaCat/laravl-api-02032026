<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('test', function(){
    // return ['key => value']
    return ['name' => 'Edgars'];
});

Route::apiResource('books', BookController::class);

// Route::get('books', [BookController::class, 'index']);
// Route::post('books', [BookController::class, 'store']);
// Route::put('books/{id}', [BookController::class, 'update']);