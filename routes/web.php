<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models;
use App\Http\Controllers\OrderController;

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
    return redirect()->route('orders_list');
});

Route::get('/orders/list', [OrderController::class, 'list'])->name('orders_list');

Route::get('/orders/create', [OrderController::class, 'create'])->name('orders_create');

Route::get('/orders/edit/{id}', [OrderController::class, 'edit'])->name('orders_edit');

Route::get('/orders/delete/{id}', [OrderController::class, 'delete'])->name('orders_delete');

Route::post('/orders/new/', [OrderController::class, 'newOrder'])->name('orders_new');

Route::post('/orders/update/{id}', [OrderController::class, 'updateOrder'])->name('orders_update');

Route::post('/orders/filter', [OrderController::class, 'filterOrder'])->name('orders_filter');