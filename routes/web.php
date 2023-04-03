<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PromisorrisController;
use App\Http\Controllers\PromisorryController;
use App\Http\Controllers\UserController;
use App\Models\Promisorris;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();
// Route::get('/', function () {
//     return view('auth.login');
// });
Route::get('/',[HomeController::class,'index']);
Route::post('/auth/logout',[LogoutController::class, 'logout']);

Route::get('/promisorry',[PromisorrisController::class, 'createPromisorry'])->name('create.promi');
Route::post('/promisorry',[PromisorrisController::class, 'storePromisorry'])->name('store.promi');

Route::get('/record/{id}',[PromisorrisController::class, 'showPromisorry'])->name('show.promi');
Route::put('/record/{id}',[PromisorrisController::class, 'updatePromisorry'])->name('update.promi');

Route::middleware(['auth','user-role:user'])->group(function()
{
    Route::get('/home', [HomeController::class, 'userHome'])->name('home');
});

Route::middleware(['auth','user-role:approver'])->group(function()
{
    Route::get('/home/admin', [HomeController::class, 'approverHome'])->name('approver.home');

});Route::middleware(['auth','user-role:verifier'])->group(function()
{
    Route::get('/home/verifier', [HomeController::class, 'verifierHome'])->name('verifier.home');
});
