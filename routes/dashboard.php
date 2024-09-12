<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\EventConteoller;
use App\Http\Controllers\Dashboard\OrganizerConteoller;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\RoleConteoller;
use App\Http\Controllers\Dashboard\SponsorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register dashboard routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])
    ->prefix('dashboard')
    ->name('dashboard.')
    ->group(function () {


    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');


    Route::get('/profile',[ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile',[ProfileController::class, 'update'])
        ->name('profile.update');

    Route::resources([
        '/organizers' => OrganizerConteoller::class,
        '/events' => EventConteoller::class,
        '/sponsors' => SponsorController::class,
        '/roles' => RoleConteoller::class,
    ]);



});
