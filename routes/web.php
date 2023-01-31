<?php

use App\Http\Middleware\AuthCheck;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CertificateController;

// login, logout
Route::controller(AuthController::class)->group(function() {
    Route::get('/', 'loginPage')->name('loginPage');

    Route::post('/login', 'login')->name('login');

    Route::post('/', 'logoutProcess')->name('logoutProcess');
});

Route::middleware([AuthCheck::class])->prefix('dashboard')->group(function () {
    // articles
    Route::controller(ArticleController::class)->group(function() {
        Route::get('articles', 'articlesPage')->name('articlesPage');
        Route::get('articles/upload', 'uploadArticle')->name('uploadArticle');
        Route::post('articles/upload','saveArticle')->name('saveArticle');
        Route::get('articles/detail/{id}','detail')->name('articleDetail');
        Route::get('articles/edit/{id}','edit')->name('articleEdit');
        Route::post('articles/update/{id}','update')->name('articleUpdate');
    });

    //  user
    Route::controller(UserController::class)->group(function() {
        Route::get('user/list', 'userList')->name('userList');
    });

    // certificate
    Route::controller(CertificateController::class)->group(function() {
        Route::get('certificate/list', 'certificateList')->name('certificateList');
        Route::get('certificate/upload', 'uploadCertificate')->name('uploadCertificate');
        Route::post('certifiate/upload', 'uploadCertificateProcess')->name('uploadCertificateProcess');
        Route::post('certificate/delete/{id}', 'deleteCertificate')->name('deleteCertificate');
    });
});



