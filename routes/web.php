<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/articles',ArticleController::class)->middleware('auth');

Route::controller(EmployeeController::class)->group(function (){
    Route::get('/employees','index')->name('employees.index');
    Route::get('/employees/create','create')->name('employees.create');
    Route::post('/employees','store')->name('employees.store');
    Route::get('/employees/{employee}/show','show')->name('employees.show');
    Route::get('/employees/{employee}/edit','edit')->name('employees.edit');
    Route::patch('/employees/{employee}','update')->name('employees.update');
    Route::delete('/employees/{employee}','destroy')->name('employees.destroy');




});

require __DIR__.'/auth.php';
