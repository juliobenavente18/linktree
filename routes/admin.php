<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\Users_linktreeController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index'])->middleware('can:/admin');

Route::resource('user', Users_linktreeController::class)->names('admin.users_linktree');

Route::resource('links', LinkController::class)->names('admin.links');

Route::get('settings', [UserController::class, 'edit'])->middleware('can:admin.users.edit');
Route::post('settings', [UserController::class, 'update']);
Route::get('{user}', [UserController::class,'show'])->middleware('can:admin.users.show');

