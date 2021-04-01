<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// category 
Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');
Route::get('/category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('category.delete');
Route::post('/category/update', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
Route::post('/category/add', [App\Http\Controllers\CategoryController::class, 'add'])->name('category.add');


// colors 
Route::get('/colors', [App\Http\Controllers\ColorController::class, 'index'])->name('colors');
Route::get('/color/delete/{id}', [App\Http\Controllers\ColorController::class, 'delete'])->name('color.delete');
Route::post('/color/update', [App\Http\Controllers\ColorController::class, 'update'])->name('color.update');
Route::post('/color/add', [App\Http\Controllers\ColorController::class, 'add'])->name('color.add');


// items 
Route::get('/items', [App\Http\Controllers\ItemController::class, 'index'])->name('items');
Route::get('/item/delete/{id}', [App\Http\Controllers\ItemController::class, 'delete'])->name('item.delete');
Route::get('/item/additempage',  [App\Http\Controllers\ItemController::class, 'addItemPage'])->name('item.additempage');
Route::post('/item/update', [App\Http\Controllers\ItemController::class, 'update'])->name('item.update');
Route::post('/item/add', [App\Http\Controllers\ItemController::class, 'add'])->name('item.add');
