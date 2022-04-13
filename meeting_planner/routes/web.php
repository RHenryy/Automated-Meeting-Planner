<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\ShiftsController;
use App\Http\Controllers\EventsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/createMeeting', [ShiftsController::class, 'index']);
Route::post('/createMeeting', [ShiftsController::class, 'index']);


Route::get('/inviteEmployees', [EmployeesController::class, 'index']);
Route::post('/welcome', [EmployeesController::class, 'store']);

Route::get('/events', [EventsController::class, 'index']);
Route::post('/events', [EventsController::class, 'store']);
Route::get('/events/destroy/{id}', [EventsController::class, 'destroy']);


