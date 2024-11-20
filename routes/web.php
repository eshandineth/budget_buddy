<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController; 
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\AllAdsController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\ExpenseController;



Route::get('/admin/dashboard', function () {return view('admin.dashboard');})->name('admin.dashboard');


// Home Route
Route::get('/', function () {return view('home'); })->name('home');


// Login Routes
Route::get('/login', function () {return view('login'); });
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.show');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post'); 


// Register Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.show');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');


// Profile
Route::middleware(['auth'])->group(function () {
Route::get('/profile', [UserProfileController::class, 'index'])->name('profile');
});

// Logout Route
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/')->with('status', 'Successfully logged out!');
})->name('logout');

// Route for deleting the account
Route::post('/delete-account', [AccountController::class, 'delete'])->name('delete-account');

Route::get('/manage-profile', [AccountController::class, 'manage'])->name('manageProfile');
//Route::put('/update-profile', [AccountController::class, 'updateProfile'])->name('profile.update');
Route::post('/account/update', [AccountController::class, 'updateProfile'])->name('account.updateProfile');

//all ads route
Route::get('/all-ads', [AllAdsController::class, 'index'])->name('all.ads');

//add listing route
Route::get('/add-listing', [ListingController::class, 'create'])->name('listings.create');
Route::post('/listings', [ListingController::class, 'store'])->name('listings.store');

Route::resource('listings', ListingController::class);
Route::get('/listings/create', [ListingController::class, 'create'])->name('listings.create');

Route::get('/listings/{listing}', [ListingController::class, 'show'])->name('listings.show');



Route::get('/listings', [ListingController::class, 'index'])->name('listings.index'); // Show all listings

Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->name('listings.edit'); // Edit a listing

Route::put('/listings/{listing}', [ListingController::class, 'update'])->name('listings.update'); // Update a listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->name('listings.destroy'); // Delete a listing




// Budgeting tool page route
Route::get('/budget', function () {
    return view('budget_tool.budget'); // Ensure the correct folder structure
});


Route::middleware(['auth'])->group(function () {  
    Route::get('/budget', [BudgetController::class, 'index'])->name('budget.index');  
    Route::post('/budget/expense', [BudgetController::class, 'storeExpense'])->name('budget.storeExpense');  
    Route::post('/budget/income', [BudgetController::class, 'storeIncome'])->name('budget.storeIncome');  
    Route::post('/budget/savings-plan', [BudgetController::class, 'selectSavingsPlan'])->name('budget.selectSavingsPlan');  
});  


Route::middleware(['auth'])->group(function () {
    Route::get('/budget/create', [BudgetController::class, 'create'])->name('budget.create');
    Route::post('/budget/store', [BudgetController::class, 'store'])->name('budget.store');
    Route::get('/budget', [BudgetController::class, 'show'])->name('budget.show');

    Route::post('/expense/store', [ExpenseController::class, 'store'])->name('expense.store');

    // Route to cancel the plan and redirect back to the creation page
    Route::get('/budget/cancel', [BudgetController::class, 'cancelPlan'])->name('budget.cancel');
});