<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    return view('login');
});

Route::get('/dashboard', function () {
    return view('articles');
})->name('articlesList');

Route::get('dashboard/articles/upload', function(){
    return view('uploadArticle');
})->name('uploadArticle');

Route::get('dashboard/user', function(){
    return view('user');
})->name('userList');

Route::get('dashboard/certificate', function() {
    return view('certificate');
})->name('certificateList');

Route::get('dashboard/certificate/upload', function(){
    return view('uploadCertificate');
})->name('uploadCertificate');
