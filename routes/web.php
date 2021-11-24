<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StocksController;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');




Route::middleware('auth:api')->get('/user', function(Request $request) {

    return $request->user();
});


Route::get('/stocks', [StocksController::class, 'index'])->middleware('auth');
Route::post('/stocks', [StocksController::class, 'showCompanies'])->middleware('auth');


Route::get('/stocks/companies', [StocksController::class, 'search'])->middleware('auth');


Route::get('/stocks/show',[StocksController::class,'view'])->middleware('auth');  //+
Route::get('/stocks/{symbol}',[StocksController::class,'view'])->middleware('auth');//+


Route::get('/emailTest',[\App\Http\Controllers\emailTestController::class,'index']);
Route::post('/emailTest',[\App\Http\Controllers\emailTestController::class,'testEmail']);

require __DIR__.'/auth.php';
