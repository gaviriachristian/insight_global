<?php

use Illuminate\Support\Facades\Route;
use App\Models;

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

Route::get('/orders', function () {
    $orders = App\Models\Order::all();
    /*echo "<pre>";
    print_r($orders[0]->vehicle->keys);
    die;*/
    return view('orders', compact('orders'));
})->name('orders');
