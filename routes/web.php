<?php

use App\Http\Controllers\CarWashServiceController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\TelegramController;
use App\Http\Controllers\TypeCarController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/clients', [ClientController::class, 'index'])->name('client.index');
Route::delete('/clients', [ClientController::class, 'destroy'])->name('client.destroy');

Route::get('/type-cars', [TypeCarController::class, 'index'])->name('type-car.index');
Route::delete('/type-cars', [TypeCarController::class, 'destroy'])->name('type-car.destroy');

Route::get('/order-statuses', [OrderStatusController::class, 'index'])->name('order-status.index');
Route::delete('/order-statuses', [OrderStatusController::class, 'destroy'])->name('order-status.destroy');

Route::get('/orders', [OrderController::class, 'index'])->name('order.index');
Route::delete('/orders', [OrderController::class, 'destroy'])->name('order.destroy');

Route::get('/car-wash-services', [CarWashServiceController::class, 'index'])->name('car-wash-service.index');
Route::delete('/car-wash-services', [CarWashServiceController::class, 'destroy'])->name('car-wash-service.destroy');



// Auth
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Tests
Route::get('/testModal', [ClientController::class, 'testModal'])->name('testModal');

//Route::get('/telegram', function(){
//    \Illuminate\Support\Facades\Http::withoutVerifying()->post('https://api.tlgr.org/bot6081210784:AAFAq7u8wGQ0xWmw6KU3pEqOmjbefvAIpQU/sendMessage',
//        [
//            'chat_id' => 499028596,
//            'text' => 'Hi'
//        ]);
//});
