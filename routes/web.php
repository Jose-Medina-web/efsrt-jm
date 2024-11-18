<?php

use App\Http\Controllers\PromocioneController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    /* Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard'); */
    Route::get('/',function(){
        return view('index');
    })->name('home');
    Route::get('/promociones',[PromocioneController::class,'index'])
    ->name('promociones.index');
    Route::get('/promociones/create',[PromocioneController::class,'create'])
    ->name('promociones.create');
    Route::post('/promociones',[PromocioneController::class,'store'])
    ->name('promociones.store');
    Route::get('/promociones/{promocione}/edit',[PromocioneController::class,'edit'])
    ->name('promociones.edit');
    Route::put('/promociones/{promocione}',[PromocioneController::class,'update'])
    ->name('promociones.update');
    Route::delete('/promociones/{promocione}',[PromocioneController::class,'destroy'])
    ->name('promociones.delete');
});

