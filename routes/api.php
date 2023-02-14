<?php

use Illuminate\Http\Request;
use App\Http\Middleware\AuthCheck;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ReactionController;
use App\Http\Controllers\Api\CertificateController;

// Route::middleware([AuthCheck::class])->group(function(){

// });

// login & register
Route::controller(AuthController::class)->group(function() {
    Route::post('/login', 'login');
    Route::post('/register', 'register');
});

Route::group(['middleware' => 'auth:sanctum'],function() {
    // logout
    Route::post('/logout', [AuthController::class, 'logout']);

    // user data
    Route::controller(UserController::class)->group(function() {
        Route::get('/user/details', 'userDetails');
        Route::post('/user/update/{id}', 'updateUser');
    });

    // certificate
    Route::get('/certificates', [CertificateController::class, 'certificateList']);

    //article
    Route::get('/articles',[ArticleController::class, 'article']);
    Route::post('/articles/search', [ArticleController::class, 'articleSearch']);

    //User Reaction
    Route::post('/reaction',[ReactionController::class,'saveReaction']);
});
