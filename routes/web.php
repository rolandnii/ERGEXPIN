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


Route::middleware(['auth',])->group( function () {
    // Route::get('/',[RouteController::class,'RedirectDashboard']);
    Route::redirect('/','/dashboard');
    Route::get('/dashboard',[RouteController::class,'ShowDashboard'])->name('dashboard.main');
    Route::get('/expense',[RouteController::class,'ShowExpense'])->name('expense.main');
    Route::get('income',[RouteController::class,'ShowIncome'])->name('income.main');
    Route::get('user',[RouteController::class,"ShowUser"])->name("user")->middleware("admin");


    // Expense routes
    Route::get('add/expense/',[RouteController::class,'ShowAddExpense'])->name('expense.add');
    Route::get('view/expense/{user}',[RouteController::class,'ShowViewExpense'])->name('expense.view');
    Route::get('delete/expense/{user}',[RouteController::class,'ShowDeleteExpense'])->name('expense.delete');
    Route::get('update/expense/{user}',[RouteController::class,'ShowUpdateExpense'])->name('expense.update');
   // Income routes
    Route::get('add/income/',[RouteController::class,'ShowAddIncome'])->name('income.add');
    Route::get('view/income/{user}',[RouteController::class,'ShowViewIncome'])->name('income.view');
    Route::get('delete/income/{user}',[RouteController::class,'ShowDeleteIncome'])->name('income.delete');
    Route::get('update/income/{user}',[RouteController::class,'ShowUpdateIncome'])->name('income.update');

    //Admin user module routes
    Route::get('add/user/',[RouteController::class,'ShowAddIncome'])->name('user.add');
    Route::get('view/user/{user_id}',[RouteController::class,'ShowViewUser'])->name('user.view');
    Route::get('delete/user/{user_id}',[RouteController::class,'ShowDeleteUser'])->name('user.delete');
    Route::get('update/user/{user_id}',[RouteController::class,'ShowUpdateUser'])->name('user.update');
    
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
