<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

// Route::get('/welcome', function () {
//     return view('welcome');
// });

Route::get('gestion_concours', function (){
    return view('gestion_concours');
});

Route::get('mention_lgl', function (){
    return view('mention_lgl');
});

Route::get('/welcome', [TestController::Class, 'page_welcome']);

Route::get('\test', [TestController::class, 'index']);