<?php

use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SubjectGroupController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::get('/me', function(Request $request) {
        return auth()->user();
    });
    Route::get('/currentOrganisation', function(Request $request) {
        $user = auth()->user();
        return $user->userToOrganisation->organisation;
    });
    //for subject groups
    Route::group(array('prefix' => 'subjectGroups'), function() {
        Route::get("/", [SubjectGroupController::class, 'show_all']);
        Route::get("/{id}", [SubjectGroupController::class, 'show']);
        Route::post("/", [SubjectGroupController::class, 'store']);
        Route::patch("/", [SubjectGroupController::class, 'update']);
        Route::delete("/{id}", [SubjectGroupController::class, 'destroy']);
    });

    //for subject
    Route::group(array('prefix' => 'subjects'), function() {
        Route::get("/", [SubjectController::class, 'show_all']);
        Route::get("/{id}", [SubjectController::class, 'show']);
        Route::post("/", [SubjectController::class, 'store']);
        Route::patch("/", [SubjectController::class, 'update']);
        Route::delete("/{id}", [SubjectController::class, 'destroy']);
    });

});
