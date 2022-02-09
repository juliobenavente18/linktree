<?php

use App\Http\Controllers\Admin\EmailDenunciaController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ImagenesMuestraController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\Users_linktreeController;
use App\Http\Controllers\Admin\VideoController;
use App\Mail\DenunciaMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index'])->middleware('can:/admin');
Route::resource('video', VideoController::class)->names('admin.video');
Route::resource('user', Users_linktreeController::class)->names('admin.users_linktree');
Route::resource('imagenes', ImagenesMuestraController::class)->names('admin.imagenes');
Route::resource('email', EmailDenunciaController::class)->names('admin.email');

Route::resource('links', LinkController::class)->names('admin.links');

Route::get('settings', [UserController::class, 'edit'])->middleware('can:admin.users.edit');
Route::post('settings', [UserController::class, 'update']);





