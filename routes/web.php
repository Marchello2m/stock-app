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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');




Route::middleware('auth:api')->get('/user', function(Request $request) {

    return $request->user();
});

Route::get('/test-mail',[TestMail::class,'build']);


Route::get('/stocks/search',[StocksController::class,'search']);
Route::get('/stocks/{symbol}',[StocksController::class,'view']);

require __DIR__.'/auth.php';
