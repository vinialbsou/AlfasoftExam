<?php

use App\Http\Controllers\ProfileController;
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

# My Route for Manager Contact
//Route::resource('managerContacts', ManagerContactController::class);
// Listar todos os contatos
Route::get('/index', [ManagerContactController::class, 'index'])->name('managerContacts.index');

// Mostrar formulário para criar um contato
Route::get('/create', [ManagerContactController::class, 'create'])->name('managerContacts.create');

// Salvar novo contato
Route::post('/store', [ManagerContactController::class, 'store'])->name('managerContacts.store');

// Mostrar contato específico (mostra os detalhes)
Route::get('/managerContacts/{contact}', [ManagerContactController::class, 'show'])->name('managerContacts.show');

// Mostrar formulário para editar contato
Route::get('/managerContacts/{contact}/edit', [ManagerContactController::class, 'edit'])->name('managerContacts.edit');

// Atualizar contato específico
Route::put('/managerContacts/{contact}', [ManagerContactController::class, 'update'])->name('managerContacts.update');
Route::patch('/managerContacts/{contact}', [ManagerContactController::class, 'update']);

// Deletar contato específico
Route::delete('/managerContacts/{contact}', [ManagerContactController::class, 'destroy'])->name('managerContacts.destroy');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/* tried to add breeze auth, but didn't have time
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
*/