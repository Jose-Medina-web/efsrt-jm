<?php

use App\Http\Controllers\PracticaController;
use App\Http\Controllers\PromocioneController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
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
    ->name('promociones.index')
    ->middleware('can:promociones.index');
    Route::get('/promociones/create',[PromocioneController::class,'create'])
    ->name('promociones.create')
    ->middleware('can:promociones.create');
    Route::post('/promociones',[PromocioneController::class,'store'])
    ->name('promociones.store')
    ->middleware('can:promociones.store');
    Route::get('/promociones/{promocione}/edit',[PromocioneController::class,'edit'])
    ->name('promociones.edit')
    ->middleware('can:promociones.edit');
    Route::put('/promociones/{promocione}',[PromocioneController::class,'update'])
    ->name('promociones.update')
    ->middleware('can:promociones.update');
    Route::delete('/promociones/{promocione}',[PromocioneController::class,'destroy'])
    ->name('promociones.delete')
    ->middleware('can:promociones.delete');

    Route::get('/users',[UserController::class,'index'])
    ->name('users.index')
    ->middleware('can:users.index');
    Route::get('/users/create',[UserController::class,'create'])
    ->name('users.create')
    ->middleware('can:users.create');
    Route::post('/users',[UserController::class,'store'])
    ->name('users.store')
    ->middleware('can:users.store');
    Route::get('/users/{user}/edit',[UserController::class,'edit'])
    ->name('users.edit')
    ->middleware('can:users.edit');
    Route::put('/users/{user}',[UserController::class,'update'])
    ->name('users.update')
    ->middleware('can:users.update');
    Route::delete('/users/{user}',[UserController::class,'destroy'])
    ->name('users.delete')
    ->middleware('can:users.delete');

    Route::get('/practicas',[PracticaController::class,'index'])
    ->name('practicas.index')
    ->middleware('can:practicas.index');
    Route::get('/practicas/create',[PracticaController::class,'create'])
    ->name('practicas.create')
    ->middleware('can:practicas.create');
    Route::post('/practicas',[PracticaController::class,'store'])
    ->name('practicas.store')
    ->middleware('can:practicas.store');
    Route::get('/practicas/{practica}/edit',[PracticaController::class,'edit'])
    ->name('practicas.edit')
    ->middleware('can:practicas.edit');
    Route::put('/practicas/{practica}',[PracticaController::class,'update'])
    ->name('practicas.update')
    ->middleware('can:practicas.update');
    Route::delete('/practicas/{practica}',[PracticaController::class,'destroy'])
    ->name('practicas.delete')
    ->middleware('can:practicas.delete');
    Route::put('/practicas/{practica}/registrarfinal',[PracticaController::class,'registrarFinal'])
    ->name('practicas.registrarfinal')
    ->middleware('can:practicas.registrarfinal');

});

Route::get('clear-cache',function(){
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    return "Cache is cleared";
});