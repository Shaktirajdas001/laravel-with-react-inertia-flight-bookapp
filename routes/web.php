<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlightBookingController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', function () {
    return Inertia::render('Auth/Login');
});

Route::get('/register', function () {
    return Inertia::render('Auth/Register');
});

Route::get('/dashboard', function () {
    $user = Auth::user();

        return Inertia::render('Dashboard', [
            'user_type' => $user->user_type, // Pass user_type as a prop
        ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/user-dashboard', function () {
    return Inertia::render('UserDashboard');
})->middleware(['auth', 'verified'])->name('userdashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    
Route::get('/bookings', [FlightBookingController::class, 'index'])->name('bookings.index');
Route::get('/bookings/create', [FlightBookingController::class, 'create'])->name('bookings.create');
Route::post('/bookings', [FlightBookingController::class, 'store'])->name('bookings.store');
Route::get('/bookings/{id}/edit', [FlightBookingController::class, 'edit'])->name('bookings.edit');
Route::get('/bookingslist', [FlightBookingController::class, 'userBookingDetails'])->name('bookings.userBookingList');
Route::put('/bookings/{id}', [FlightBookingController::class, 'update'])->name('bookings.update');
Route::delete('/bookings/{id}', [FlightBookingController::class, 'destroy'])->name('bookings.destroy');

   
});

require __DIR__.'/auth.php';
