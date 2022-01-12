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
Auth::routes();
Route::get('/admin_dashboard', 'App\Http\Controllers\Admin\DashboardController@index')->name('admin')->middleware('admin');
Route::get('/student_dsahboard', 'App\Http\Controllers\Student\DashboardController@index')->name('student')->middleware('student');
/* Route::get('/admin_dashboard', 'App\Http\Controllers\Admin\DashboardController@index')->middleware('role:admin');
Route::get('/student_dashboard', 'App\Http\Controllers\Student\DashboardController@index')->middleware('role:student'); */

Route::get('/manageAccount', function () {
    return view('manageAccount');
});

Route::get('/registerStud', function () {
    return view('registerStud');
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
    return view('manageTextbook');
});

Route::get('/registerBook', [manageTextbookController::class, 'index']);
Route::post('/registerBook', [manageTextbookController::class, 'store'])->name('store');
Route::get('qrcode/{id}', [manageTextbookController::class, 'generate'])->name('generate');

Route::get('/viewTextBooksQR', 'App\Http\Controllers\manageTextbookController@index1');
Route::get('/textbookStatus', 'App\Http\Controllers\manageTextbookController@index2');

Route::get('/viewStudFine', 'App\Http\Controllers\manageTextbookController@viewStudFine');
Route::get('viewFine/{id}', 'App\Http\Controllers\manageTextbookController@viewFines');

Route::get('/manageReturnLend', function () {
    return view('manageReturnLend');
});

Route::get('/lendscan', function () {
    return view('lendscan');
});
Route::post('/lendscan', 'App\Http\Controllers\manageReturnLendController@lend')->name('lend'); 
Route::get('/returnscan', function () {
    return view('returnscan');
});
Route::post('/returnscan', 'App\Http\Controllers\manageReturnLendController@return')->name('return'); 

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Student

Route::get('/manageAccountS', function () {
    return view('manageAccountS');
});

Route::get('/viewAccount', 'App\Http\Controllers\manageAccountController@viewAcc');

Route::get('/manageTextbookS', function () {
    return view('manageTextbookS');
});
Route::get('studTBStatus', 'App\Http\Controllers\manageTextbookController@stdlend');

Route::get('/viewFine', 'App\Http\Controllers\manageTextbookController@viewFine');

Route::get('/payFine', 'App\Http\Controllers\managePaymentController@viewFine');


Route::get('/confirmPayment', function () {
    return view('confirmPayment');
});


// Route::post('/', 'App\Http\Controllers\managePaymentController@updateFine')->name('updateFine'); 


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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
