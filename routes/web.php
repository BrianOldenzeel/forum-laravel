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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [\App\Http\Controllers\HomeController::class,'index'])->name('home.index');

Route::get('/thread/{id}', [\App\Http\Controllers\ThreadController::class, 'index'])->name('thread.index');

Route::get('/topic/{topic}', [\App\Http\Controllers\TopicController::class, 'index'])->name('topic.index');

//Route::post('/topic/{id}', [\App\Http\Controllers\ReplyController::class, 'store'])->name('reply.store');

Route::middleware('auth')->group(function () {
    Route::post('/topic/{id}', [\App\Http\Controllers\ReplyController::class, 'store'])->name('reply.store');
});

Route::middleware('auth')->group(function () {
    Route::post('/thread/{id}', [\App\Http\Controllers\TopicMakeController::class, 'store'])->name('TopicMake.store');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
