<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResturentController;
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
Route::get('myResturent', [App\Http\Controllers\ResturentController::class, 'index'])->name('resturent.index');
Route::get('myResturent/create', [App\Http\Controllers\ResturentController::class, 'create_resturent'])->name('resturent.create');
Route::post('resturent', [App\Http\Controllers\ResturentController::class, 'store'])->name('resturent.store');
Route::get('myResturent/{id}', [App\Http\Controllers\ResturentController::class, 'add_items'])->name('resturent.edit');
Route::get('resturents', [App\Http\Controllers\ResturentController::class, 'myResturent'])->name('resturent.public');
Route::get('resturents/{id}', [App\Http\Controllers\ResturentController::class, 'changeQty'])->name('resturent.show');
Route::put('resturent/{id}', [App\Http\Controllers\ResturentController::class, 'reduced_qty'])->name('resturent.update');

Route::get('user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
Route::get('user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
Route::post('user', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
Route::get('user/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::put('user/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::get('sendnotification', [App\Http\Controllers\UserController::class, 'sendnotification']);

Route::get('items', [App\Http\Controllers\ItemController::class, 'index'])->name('items.index');
Route::get('items/create', [App\Http\Controllers\ItemController::class, 'create'])->name('items.create');
Route::post('item', [App\Http\Controllers\ItemController::class, 'store'])->name('items.store');
Route::get('myResturent/{id}/items', [App\Http\Controllers\ItemController::class, 'item_list'])->name('items.edit');

Route::post('items', [App\Http\Controllers\ItemResturentController::class, 'store'])->name('itemresturent.store');
Route::get('add_items', [App\Http\Controllers\ItemResturentController::class, 'add_item'])->name('itemresturent.add_item');
Route::get('logActivity', [App\Http\Controllers\ActivityController::class, 'index'])->name('log.index');
