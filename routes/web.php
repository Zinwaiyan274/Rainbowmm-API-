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

        // Router::post('articles', "search")->name('search');
    });

    //  user
    Route::controller(UserController::class)->group(function() {
        Route::get('user/list', 'userList')->name('userList');

        Route::post('user/list', 'userSearch')->name('userSearch');
    });

    // certificate
    Route::controller(CertificateController::class)->group(function() {
        Route::get('certificate/list', 'certificateList')->name('certificateList');
        Route::get('certificate/upload', 'uploadCertificate')->name('uploadCertificate');
        Route::post('certifiate/upload', 'uploadCertificateProcess')->name('uploadCertificateProcess');
        Route::post('certificate/delete/{id}', 'deleteCertificate')->name('deleteCertificate');
    });
});



