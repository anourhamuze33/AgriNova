<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FilesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/register/form', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');


Route::get('/download/diplome/{fileName}', [FilesController::class, 'downloadDiplome'])->name('file.diplome.download');
Route::get('/show/diplome/{fileName}', [FilesController::class, 'showDiplome'])->name('file.Diplome.show');

Route::get('/show/cin/{fileName}', [FilesController::class, 'showCIN'])->name('file.CIN.show');
Route::get('/download/cin/{fileName}', [FilesController::class, 'downloadCIN'])->name('file.cin.download');
