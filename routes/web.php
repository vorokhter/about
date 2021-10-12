<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\ThreadController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/users', [UserController::class, 'users'])->name('users');
Route::get('/settings', [UserController::class, 'settings'])->name('settings');

Route::get('/auth', [AuthController::class, 'auth'])->name('auth');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('/auth/registration', [AuthController::class, 'registration'])->name('auth.registration');

Route::post('/thread/personal', [ThreadController::class, 'getPersonal'])->name('thread.getPersonal');
Route::post('/thread/user-bar', [ThreadController::class, 'getUserBar'])->name('thread.getUserBar');
Route::post('/thread/message-list', [ThreadController::class, 'getMessageList'])->name('thread.getMessageList');
Route::post('/thread/last-message', [ThreadController::class, 'getLastMessage'])->name('thread.getLastMessage');
Route::get('/thread/thread-list', [ThreadController::class, 'getThreadList'])->name('thread.getThreadList');
Route::post('/thread/send-message', [ThreadController::class, 'sendMessage'])->name('thread.sendMessage');

Route::post('/user/search-user', [UserController::class, 'searchUser'])->name('user.searchUser');
Route::get('/user/get-users', [UserController::class, 'getAllUsers'])->name('user.getAllUsers');
Route::post('/user/edit-user', [UserController::class, 'editUser'])->name('user.editUser');
Route::post('/user/edit-avatar', [UserController::class, 'editAvatar'])->name('user.editAvatar');
