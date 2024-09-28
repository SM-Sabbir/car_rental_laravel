<?php
namespace App\Http\Controllers\Admin;
namespace App\Http\Controllers\Frontend;

use App\Models\Car;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


use App\Http\Controllers\Admin\CarController as AdminCarController;
use App\Http\Controllers\Admin\RentalController as AdminRentalController;
use App\Http\Controllers\Frontend\CarController as FrontendCarController;
use App\Http\Controllers\Frontend\RentalController as FrontendRentalController;



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




Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('cars', AdminCarController::class);
    Route::resource('rentals', AdminRentalController::class);
    Route::resource('customers', CustomerController::class);
    Route::get('customers/{id}/rentals', [CustomerController::class, 'rentalHistory'])->name('customers.rentals');
    Route::post('rentals/{id}/cancel', [AdminRentalController::class, 'cancel'])->name('rentals.cancel');

    // Add other admin routes here
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/customer_dashboard', [PageController::class, 'index'])->name('customer_dashboard');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');



    //frontend
    Route::resource('car', FrontendCarController::class);
    Route::resource('rental', FrontendRentalController::class);
    Route::post('rental/{id}/cancel', [RentalController::class, 'cancel'])->name('rental.cancel');

});


//public
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');






require __DIR__.'/auth.php';
