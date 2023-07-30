<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Route;

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


Route::middleware(['auth','verified'])->group( function () {
    Route::get('/',[RouteController::class,'ShowDashboard'])->name("dashboard");
    Route::get('/dashboard',[RouteController::class,'ShowDashboard'])->name('dashboard');
    Route::get('/expense',[RouteController::class,'ShowExpense'])->name('normal.expense');
    // Expense routes
    Route::get('add/expense/',[RouteController::class,'ShowAddExpense'])->name("add.expense");
    Route::get('view/expense/{user}',[RouteController::class,'ShowViewExpense'])->name("normal.expense");
    Route::get('delete/expense/{user}',[RouteController::class,'ShowDeleteExpense'])->name("normal.expense");
    Route::get('update/expense/{user}',[RouteController::class,'ShowUpdateExpense'])->name("normal.expense");
    // Income routes
    // Route::get('add/income/',[RouteController::class,'ShowIncomeForm'])->name("add.income");
    // Route::get('view/income/',[RouteController::class,'ShowIncomeForm'])->name("view.income");
    // Route::get('delete/income/',[RouteController::class,'ShowIncomeFPorm'])->name("delete.income");
    // Route::get('update/income/',[RouteController::class,'ShowIncomeForm'])->name("update.income");
    
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
