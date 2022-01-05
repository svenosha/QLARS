<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\manageTextbookController;


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

Route::get('/manageAccount', function () {
    return view('manageAccount');
});

Route::get('/admin_dashboard', 'App\Http\Controllers\Admin\DashboardController@index')->middleware('role:admin');
Route::get('/student_dashboard', 'App\Http\Controllers\Student\DashboardController@index')->middleware('role:student');

Route::get('/registerStud', function () {
    return view('registerStud');
});

Route::get('insert', 'App\Http\Controllers\manageAccountController@insertform');
Route::post('create', 'App\Http\Controllers\manageAccountController@insert'); 
Route::get('/viewStudents', 'App\Http\Controllers\manageAccountController@index');
Route::get('/editAccount', 'App\Http\Controllers\manageAccountController@edit');

Route::get('editStd/{StdID}', 'App\Http\Controllers\manageAccountController@editStd');
Route::post('editStd/{StdID}', 'App\Http\Controllers\manageAccountController@updateStd');
Route::get('deleteStd/{StdID}', 'App\Http\Controllers\manageAccountController@deleteStd');

Route::get('/lendscan', function () {
    return view('lendscan');
});

Route::get('/manageTextbook', function () {
    return view('manageTextbook');
});

Route::get('/registerBook', [manageTextbookController::class, 'index']);
Route::post('/registerBook', [manageTextbookController::class, 'store'])->name('store');
Route::get('qrcode/{id}', [manageTextbookController::class, 'generate'])->name('generate');

//Route::get('/scanqr', function () {
    //return view('scanqrcode');
//});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



//Route::get('/registerBook', 'App\Http\Controllers\BookController@index');
// Route::post('/registerBook', 'App\Http\Controllers\BookController@store');


/*Route::get('insert', 'App\Http\Controllers\registerStud@insertform');
Route::post('create', 'App\Http\Controllers\registerStud@insert'); 

/* Route::post('/registerStud', [registerStud::class, 'insertform'])->name('insert');
Route::post('/registerStud', [registerStud::class, 'insert'])->name('create'); */


Route::get('/viewTextbook', 'App\Http\Controllers\viewTextbookController@index');
Route::get('/viewStudents', 'App\Http\Controllers\viewStudentController@index');
Route::get('scanqr/{StdID}', 'App\Http\Controllers\viewStudentController@returns')->name('returns'); 
Route::get('lscan/{StdID}', 'App\Http\Controllers\viewStudentController@lends')->name('lends'); 

Route::post('/lendscan', 'App\Http\Controllers\QRCode@lend')->name('lend'); 
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
