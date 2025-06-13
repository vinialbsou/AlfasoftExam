<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagerContactController;

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

Route::get('/', [ManagerContactController::class, 'index'])->name('contacts.index');

Route::middleware('auth')->group(function () {
    Route::resource('contacts', ManagerContactController::class)->except(['index']);
});