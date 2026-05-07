<?php

use App\Http\Controllers\cms\auth\LoginController;
use App\Http\Controllers\cms\UserController;
use App\Livewire\{
    Home
};
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('login', fn () => redirect()->route('cms.login'))->name('login');

Route::prefix('cms')->name('cms.')->group(function (): void {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate'])->name('login.authenticate');

    Route::middleware('auth')->group(function (): void {
        Route::get('dashboard', fn () => view('cms.dashboard'))->name('dashboard');
        Route::resource('users', UserController::class);
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    });
});
