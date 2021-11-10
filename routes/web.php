<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;


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
    return view('welcome');
});

Route::get('/registerStud', function () {
    return view('registerStud');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/registerBook', [BookController::class, 'index']);
Route::post('/registerBook', [BookController::class, 'store'])->name('store');
Route::get('qrcode/{id}', [BookController::class, 'generate'])->name('generate');
