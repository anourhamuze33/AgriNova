<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FilesController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Metadata\Group;

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/register/form', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login/form', [AuthController::class, 'showLogin'])->name('login.form');
Route::middleware('CheckDemandeApproved')->group(function (){
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::post('/admin/acceptRefuse/{user}', [AdminController::class, 'acceptOrRefuse'])->name('acceptOrRefuse');


Route::get('/download/diplome/{fileName}', [FilesController::class, 'downloadDiplome'])->name('file.diplome.download');
Route::get('/show/diplome/{fileName}', [FilesController::class, 'showDiplome'])->name('file.Diplome.show');

Route::get('/show/cin/{fileName}', [FilesController::class, 'showCIN'])->name('file.CIN.show');
Route::get('/download/cin/{fileName}', [FilesController::class, 'downloadCIN'])->name('file.cin.download');
