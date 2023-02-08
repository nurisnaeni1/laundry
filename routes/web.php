<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('user', [App\Http\Controllers\UserController::class, 'index'])->middleware(['checkLevel:admin'])->name('user.index');
Route::get('user/create', [App\Http\Controllers\UserController::class, 'create'])->middleware(['checkLevel:admin'])->name('user.create');
Route::post('user/store', [App\Http\Controllers\UserController::class, 'store'])->middleware(['checkLevel:admin'])->name('user.store');
Route::get('user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->middleware(['checkLevel:admin'])->name('user.edit');
Route::put('user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->middleware(['checkLevel:admin'])->name('user.update');
Route::get('user/show/{id}', [App\Http\Controllers\UserController::class, 'show'])->middleware(['checkLevel:admin'])->name('user.show');
Route::delete('user/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->middleware(['checkLevel:admin'])->name('user.delete');

Route::get('outlet', [App\Http\Controllers\OutletController::class, 'index'])->middleware(['checkLevel:admin'])->name('outlet.index');
Route::get('outlet/create', [App\Http\Controllers\OutletController::class, 'create'])->middleware(['checkLevel:admin'])->name('outlet.create');
Route::post('outlet/store', [App\Http\Controllers\OutletController::class, 'store'])->middleware(['checkLevel:admin'])->name('outlet.store');
Route::get('outlet/edit/{id}', [App\Http\Controllers\OutletController::class, 'edit'])->middleware(['checkLevel:admin'])->name('outlet.edit');
Route::put('outlet/update/{id}', [App\Http\Controllers\OutletController::class, 'update'])->middleware(['checkLevel:admin'])->name('outlet.update');
Route::delete('outlet/delete/{id}', [App\Http\Controllers\OutletController::class, 'destroy'])->middleware(['checkLevel:admin'])->name('outlet.delete');

Route::get('member', [App\Http\Controllers\MemberController::class, 'index'])->middleware(['checkLevel:admin'])->name('member.index');
Route::get('member/create', [App\Http\Controllers\MemberController::class, 'create'])->middleware(['checkLevel:admin'])->name('member.create');
Route::post('member/store', [App\Http\Controllers\MemberController::class, 'store'])->middleware(['checkLevel:admin'])->name('member.store');
Route::get('member/edit/{id}', [App\Http\Controllers\MemberController::class, 'edit'])->middleware(['checkLevel:admin'])->name('member.edit');
Route::put('member/update/{id}', [App\Http\Controllers\MemberController::class, 'update'])->middleware(['checkLevel:admin'])->name('member.update');
Route::delete('member/delete/{id}', [App\Http\Controllers\MemberController::class, 'destroy'])->middleware(['checkLevel:admin'])->name('member.delete');

Route::get('paket', [App\Http\Controllers\PaketController::class, 'index'])->middleware(['checkLevel:admin'])->name('paket.index');
Route::get('paket/create', [App\Http\Controllers\PaketController::class, 'create'])->middleware(['checkLevel:admin'])->name('paket.create');
Route::post('paket/store', [App\Http\Controllers\PaketController::class, 'store'])->middleware(['checkLevel:admin'])->name('paket.store');
Route::get('paket/edit/{id}', [App\Http\Controllers\PaketController::class, 'edit'])->middleware(['checkLevel:admin'])->name('paket.edit');
Route::put('paket/update/{id}', [App\Http\Controllers\PaketController::class, 'update'])->middleware(['checkLevel:admin'])->name('paket.update');
Route::delete('paket/delete/{id}', [App\Http\Controllers\PaketController::class, 'destroy'])->middleware(['checkLevel:admin'])->name('paket.delete');