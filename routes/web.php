<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\SubmitController;
use App\Http\Controllers\SubtopicController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('login:admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard']);
    Route::get('/admin/user', [AdminController::class, 'user']);
    Route::get('/admin/user/delete/{id}', [UserController::class, 'removeUser']);
    Route::get('/admin/modul', [AdminController::class, 'modul']);
    Route::get('/admin/modul/delete/{id}', [ModulController::class, 'removeModul']);
    Route::get('/admin/modul/{id}', [AdminController::class, 'topic']);
    Route::get('/admin/modul/{id}/{mode}', [ModulController::class, 'toggle']);
    Route::get('/admin/modul/{idmodul}/review/{id}', [AdminController::class, 'review']);
    Route::get('/admin/modul/{idmodul}/review/{id}/approve', [ModulController::class, 'approve']);
    Route::get('/admin/modul/topic/delete/{id}', [TopicController::class, 'removeTopic']);
    Route::get('/admin/modul/subtopic/delete/{id}', [SubtopicController::class, 'removeSubtopic']);

    Route::post('/admin/modul/{idmodul}/review/{id}', [SubmitController::class, 'revisi']);
    Route::post('/admin/user', [UserController::class, 'insertUser']);
    Route::post('/admin/modul', [ModulController::class, 'insertModul']);
    Route::post('/admin/modul/{id}', [TopicController::class, 'insertTopic']);
    Route::post('/admin/modul/{id}/topic', [SubtopicController::class, 'insertSubtopic']);

    Route::put('/admin/user', [UserController::class, 'updateUser']);
    Route::put('/admin/modul/{id}', [TopicController::class, 'updateTopic']);
    Route::put('/admin/modul/{id}/topic', [SubtopicController::class, 'updateSubtopic']);
});

Route::middleware('login:islogin')->group(function () {
    Route::get('/login', function () {
        return view('pages.login');
    });
    Route::get('/register', function () {
        return view('pages.register');
    });
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('login')->group(function () {
    Route::get('/', [PublicController::class, 'dashboard']);
    Route::get('/modul', [PublicController::class, 'modul']);
    Route::get('/modul/{id}', [PublicController::class, 'topic']);
    Route::get('/modul/{idmodul}/{id}', [PublicController::class, 'submit']);

    Route::post('/modul/{idmodul}/{id}', [SubmitController::class, 'check']);
});

Route::get('/theme/{mode}', [ThemeController::class, 'switch']);
Route::get('/logout', function () {
    session()->flush();
    return redirect('/login');
});

Route::get('/verify', [AuthController::class, 'verify']);

Route::get('/test', function () {
    dd(env('APP_URL'));
});
