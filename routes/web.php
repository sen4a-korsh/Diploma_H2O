<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\TelegramController;
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

//Route::get('/telegram', function(){
//    \Illuminate\Support\Facades\Http::withoutVerifying()->post('https://api.tlgr.org/bot6081210784:AAFAq7u8wGQ0xWmw6KU3pEqOmjbefvAIpQU/sendMessage',
//        [
//            'chat_id' => 499028596,
//            'text' => 'Hi'
//        ]);
//});

Route::get('/clients', [ClientController::class, 'index']);
Route::get('/clients/list', [ClientController::class, 'getStudents'])->name('client.list');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
