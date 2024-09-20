<?php

use App\Http\Controllers\Api\V1\CalenderController;
use App\Http\Controllers\Api\V1\CommentController;
use App\Http\Controllers\Api\V1\EventController;
use App\Http\Controllers\Api\V1\FilterController;
use App\Http\Controllers\Api\V1\OrganizerController;
use App\Http\Controllers\Api\V1\ProfileController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/comments', [CommentController::class, 'index']);
Route::middleware('auth:sanctum')
    ->group(function () {


        Route::get('profile', [ProfileController::class, 'show'])->middleware('auth:sanctum');
        Route::put('profile', [ProfileController::class, 'update'])->middleware('auth:sanctum');

        Route::get('events/upcoming', [EventController::class, 'getUpcomingEvents']);
        Route::get('events/{id}',[EventController::class,'show']);
        Route::post('recommended-events',[EventController::class,'setRecommendedEvents']);
        Route::get('recommended-events',[EventController::class,'getRecommendedEvents']);
        Route::post('favorite-events/{id}',[EventController::class,'setFavoriteEvents']);
        Route::get('users/favorite-events',[EventController::class,'getUserFavoriteEvents']);
        Route::delete('favorite-events/{id}',[EventController::class,'deleteFavoriteEvents']);

        Route::apiResource('comments',CommentController::class)->except(['index']);

        Route::get('/organizers',[OrganizerController::class,'index']);
        Route::get('/organizers/{id}',[OrganizerController::class,'show']);

        Route::get('calender',[CalenderController::class,'index']);
        Route::post('calender',[CalenderController::class,'store']);

        Route::get("search",[FilterController::class,'search']);
        Route::get("filter",[FilterController::class,'filter']);



    });
Route::get('users',[UserController::class,'index']);
Route::get('events',[EventController::class,'index']);
Route::get('favorite-events',[EventController::class,'getFavoriteEvents']);
require __DIR__.'/api-auth.php';
