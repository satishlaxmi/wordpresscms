<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PostController; 
use App\Http\Controllers\API\MediaController; 
use App\Http\Controllers\API\CatogeryController ; 




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('posts', [PostController::class,'index']);

//route group for the posts
Route::group(['prefix' => 'post'], function () {
    Route::post('add', [PostController::class,'add']);
    Route::get('edit/{id}', [PostController::class,'edit']);
    Route::post('update/{id}', [PostController::class,'update']);
    Route::delete('delete/{id}', [PostController::class,'delete']);
});

//route group for the catogery 
Route::group(['prefix'=>'catogery'],function(){
    Route::post('add',[CatogeryController::class,'add']);
    Route::get('get',[CatogeryController::class,'getCatogeries']);
});

Route::get('/media',[MediaController::class,'index']);

