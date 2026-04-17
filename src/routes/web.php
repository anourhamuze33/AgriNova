<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CropController;
use App\Http\Controllers\CultureController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::post('/admin/acceptRefuse/{user}', [AdminController::class, 'acceptOrRefuse'])->name('acceptOrRefuse');
    
Route::Resource('fields', FieldController::class);
Route::Resource('crops', CropController::class);
Route::Resource('cultures', CultureController::class);
Route::Resource('equipments', EquipmentController::class);
Route::get('/stocks', [StockController::class, 'index'])->name('stocks.index');
Route::patch('/cultures/next/{culture}', [CultureController::class, 'suivantEtape'])->name('cultures.next');

Route::get('/register/form', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login/form', [AuthController::class, 'showLogin'])->name('login.form');
Route::middleware('CheckDemandeApproved')->group(function (){
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});



Route::get('/download/diplome/{fileName}', [FilesController::class, 'downloadDiplome'])->name('file.diplome.download');
Route::get('/show/diplome/{fileName}', [FilesController::class, 'showDiplome'])->name('file.Diplome.show');

Route::get('/show/cin/{fileName}', [FilesController::class, 'showCIN'])->name('file.CIN.show');
Route::get('/download/cin/{fileName}', [FilesController::class, 'downloadCIN'])->name('file.cin.download');
