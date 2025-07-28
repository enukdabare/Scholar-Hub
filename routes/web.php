<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;


Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/signup', [PageController::class, 'signup'])->name('signup');
Route::get('/login', [PageController::class, 'login'])->name('login');
Route::get('/admindashboard', [PageController::class, 'adminDashboard'])->name('admindashboard');
Route::get('/parentDashboard', [PageController::class, 'parentDashboard'])->name('parentDashboard');
Route::get('/storesfront', [PageController::class, 'storesfront'])->name('storesfront');
Route::get('/checkout', [PageController::class, 'checkout'])->name('checkout');