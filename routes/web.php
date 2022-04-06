<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BookRecordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Models\BookRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

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
    return view('auth.login');
});

Auth::routes();


Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/user/export', [UserController::class, 'export'])->name('user.export');
Route::put('/user/suspend/{user}', [UserController::class, 'suspendUser'])->name('user.suspend');


Route::get('/book/export', [BookController::class, 'export'])->name('book.export');
Route::post('/book/import', [BookController::class, 'import'])->name('book.import');
Route::get('/book-record/export', [BookRecordController::class, 'export'])->name('bookrecord.export');


Route::resource('/book', BookController::class);
Route::resource('/user', UserController::class);
Route::resource('/book-record', BookRecordController::class);
