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

Auth::routes();
Route::get('/admin_dashboard', 'App\Http\Controllers\Admin\DashboardController@index')->name('admin')->middleware('admin');
Route::get('/student_dashboard', 'App\Http\Controllers\Student\DashboardController@index')->name('student')->middleware('student');


Route::get('/manageAccount', function () {
    return view('manageAccount.manageAccount');
});

Route::get('/registerStud', function () {
    return view('manageAccount.registerStud');
});

Route::get('insert', 'App\Http\Controllers\manageAccountController@insertform');
Route::post('create', 'App\Http\Controllers\manageAccountController@insert'); 
Route::get('/viewStudents', 'App\Http\Controllers\manageAccountController@index');
Route::get('/editAccount', 'App\Http\Controllers\manageAccountController@edit');

Route::get('editStd/{id}', 'App\Http\Controllers\manageAccountController@editStd');
Route::post('editStd/{id}', 'App\Http\Controllers\manageAccountController@updateStd');
Route::get('deleteStd/{id}', 'App\Http\Controllers\manageAccountController@deleteStd');

Route::get('lendTB/{id}', 'App\Http\Controllers\manageAccountController@lendTB');



Route::get('/manageTextbook', function () {
    return view('manageTextbook.manageTextbook');
});

Route::get('/registerBook', [manageTextbookController::class, 'index']);
Route::post('/registerBook', [manageTextbookController::class, 'store'])->name('store');
Route::get('qrcode/{id}', [manageTextbookController::class, 'generate'])->name('generate');

Route::get('/viewTextBooksQR', 'App\Http\Controllers\manageTextbookController@index1');
Route::get('/textbookStatus', 'App\Http\Controllers\manageTextbookController@index2');

Route::get('/viewStudFine', 'App\Http\Controllers\manageTextbookController@viewStudFine');
Route::get('viewFine/{id}', 'App\Http\Controllers\manageTextbookController@viewFines');
Route::get('paidFine/{id}', 'App\Http\Controllers\manageTextbookController@paidFines');
Route::get('/finepaid/{id}', 'App\Http\Controllers\manageTextbookController@finepaid');



Route::get('/manageReturnLend', function () {
    return view('manageReturnLend.manageReturnLend');
});

Route::get('/lendscan', function () {
    return view('manageReturnLend.lendscan');
});
Route::post('/lendscan', 'App\Http\Controllers\manageReturnLendController@lend')->name('lend'); 

Route::get('/returnscan', function () {
    return view('manageReturnLend.returnscan');
});
Route::post('/returnscan', 'App\Http\Controllers\manageReturnLendController@return')->name('return'); 

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Student

Route::get('/manageAccountS', function () {
    return view('manageAccount.student.manageAccountS');
});

Route::get('/viewAccount', 'App\Http\Controllers\manageAccountController@viewAcc');

Route::get('/manageTextbookS', function () {
    return view('manageTextbook.student.manageTextbookS');
});
Route::get('studTBStatus', 'App\Http\Controllers\manageTextbookController@stdlend');

Route::get('viewFineStud', 'App\Http\Controllers\manageTextbookController@viewFineStud');



// Route::post('/', 'App\Http\Controllers\managePaymentController@updateFine')->name('updateFine'); 


//Route::get('/registerBook', 'App\Http\Controllers\BookController@index');
// Route::post('/registerBook', 'App\Http\Controllers\BookController@store');


/*Route::get('insert', 'App\Http\Controllers\registerStud@insertform');
Route::post('create', 'App\Http\Controllers\registerStud@insert'); 

/* Route::post('/registerStud', [registerStud::class, 'insertform'])->name('insert');
Route::post('/registerStud', [registerStud::class, 'insert'])->name('create'); */


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
