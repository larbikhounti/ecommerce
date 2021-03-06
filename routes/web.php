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
Route::get('/Category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');
Route::get('/Category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('category.delete');
Route::post('/Category/update', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
Route::post('/Category/add', [App\Http\Controllers\CategoryController::class, 'add'])->name('category.add');


// colors 
Route::get('/Colors', [App\Http\Controllers\ColorController::class, 'index'])->name('colors');
Route::get('/Color/delete/{id}', [App\Http\Controllers\ColorController::class, 'delete'])->name('color.delete');
Route::post('/Color/update', [App\Http\Controllers\ColorController::class, 'update'])->name('color.update');
Route::post('/Color/add', [App\Http\Controllers\ColorController::class, 'add'])->name('color.add');

// sizes
Route::get('/sizes', [App\Http\Controllers\SizesController::class, 'index'])->name('sizes');
Route::get('/size/delete/{id}', [App\Http\Controllers\SizesController::class, 'delete'])->name('size.delete');
Route::post('/size/update', [App\Http\Controllers\SizesController::class, 'update'])->name('size.update');
Route::post('/size/add', [App\Http\Controllers\SizesController::class, 'add'])->name('size.add');

// items 
Route::get('/items', [App\Http\Controllers\ItemController::class, 'index'])->name('items');
Route::get('/item/delete/{id}', [App\Http\Controllers\ItemController::class, 'delete'])->name('item.delete');
Route::post('/item/update', [App\Http\Controllers\ItemController::class, 'update'])->name('item.update');
Route::post('/item/add', [App\Http\Controllers\ItemController::class, 'add'])->name('item.add');

// item update page and add
Route::get('/item/additempage',  [App\Http\Controllers\ItemController::class, 'addItemPage'])->name('item.additempage');
Route::get('/item/updateitempage/{id}',  [App\Http\Controllers\ItemController::class, 'updateItemPage'])->name('item.updateitempage');

// orders
Route::get('/orders', [App\Http\Controllers\orderController::class, 'index'])->name('orders');
Route::get('/orders/info/client/{client_id}', [App\Http\Controllers\orderController::class, 'client_info'])->name('client.info');
Route::get('/orders/info/item/{item_id}', [App\Http\Controllers\orderController::class, 'item_info'])->name('item.info');
Route::get('/orders/info/paid/{item_id}', [App\Http\Controllers\orderController::class, 'setPaid'])->name('item.paid');