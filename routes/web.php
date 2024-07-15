<?php

use Illuminate\Support\Facades\Route;
use App\Events\ExampleEvent;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/broadcast', function () {
    event(new ExampleEvent('Primeira mensagem em websocket'));
    return 'Event has been sent!';
});
