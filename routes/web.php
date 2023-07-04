<?php

use App\Http\Controllers\ApproverController;
use App\Http\Controllers\BillingUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PromisorrisController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerifierController;

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
Route::get('/', function () {
    return view('auth.login');
});
Route::get('/', [HomeController::class, 'index']);
Route::post('/auth/logout', [LogoutController::class, 'logout']);

Route::middleware(['auth', 'user-role:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'userHome'])->name('home');
    Route::get('/promisorry', [PromisorrisController::class, 'createPromisorry'])->name('create.promi');
    Route::post('/promisorry', [PromisorrisController::class, 'storePromisorry'])->name('store.promi');
    // Route::post('/promisorry', [PromisorrisController::class, 'storeBilling']);
    Route::get('/promisorry/{id}', [UserController::class, 'showUserPromisorry'])->name('showUser.promi');
    Route::put('/promisorry/{id}', [UserController::class, 'updateUserPromisorry'])->name('updateUser.promi');
    Route::get('/print/{id}', [UserController::class, 'PrintPromi'])->name('print_promi');
    Route::get('/print/{id}', [UserController::class, 'Getusers']);

});

Route::middleware(['auth', 'user-role:approver'])->group(function () {
    Route::get('/home/admin', [HomeController::class, 'approverHome'])->name('approver.home');
    Route::get('/admin/manage_user', [PromisorrisController::class, 'showuser'])->name('show.user');
    Route::put('/edit/user/{id}', [ApproverController::class, 'update'])->name('update.user');
    Route::get('/user/{id}', [PromisorrisController::class, 'showUserDetails'])->name('user.details');
    Route::get('/record/{id}', [PromisorrisController::class, 'showPromisorry'])->name('show.promi');
    Route::put('/record/{id}', [PromisorrisController::class, 'updatePromisorry'])->name('update.promi');
});

Route::middleware(['auth', 'user-role:verifier'])->group(function () {
    Route::get('/home/verifier', [HomeController::class, 'verifierHome'])->name('verifier.home');
    Route::get('/verifier/promisorry', [VerifierController::class, 'create'])->name('verifier.create');
    Route::post('/verifier/promisorry', [VerifierController::class, 'store'])->name('verifier.store');
    Route::get('/verifier/record/{id}', [VerifierController::class, 'show'])->name('verifier.show');
    Route::put('/verifier/record/{id}', [VerifierController::class, 'update'])->name('verifier.update');
});

Route::middleware(['auth', 'user-role:billing'])->group(function () {
    Route::get('/home/billing', [HomeController::class, 'billingHome'])->name('billing.home');
    Route::get('/billing/record/{id}', [BillingUserController::class, 'show'])->name('billing.show');
    Route::put('/billing/record/{id}', [BillingUserController::class, 'update'])->name('billing.update');
    Route::post('/billing/record/{id}', [BillingUserController::class, 'updatelocal']);
    
});

