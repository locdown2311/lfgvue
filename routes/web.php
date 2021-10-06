<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

    //TODO Criar rota resource para activity

Route::middleware(['auth:sanctum'])->group(function (){
    Route::get('/dashboard',[\App\Http\Controllers\ActivityController::class,'index'])->name('activity.index');
    Route::resource('activity',\App\Http\Controllers\ActivityController::class)->except(['show']);
    Route::get('/activity/view/{slug}',[\App\Http\Controllers\ActivityViewController::class,'show'])->name('activity.show');
    Route::post('/activity/join/{id}',[\App\Http\Controllers\ActivityViewController::class,'joinActivity'])->name('activity.join');
    Route::post('/activity/quit/{id}',[\App\Http\Controllers\ActivityViewController::class,'quitActivity'])->name('activity.quit');
});
