<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalenderEntriesController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[CalenderEntriesController::class,'index']);

Route::post('/action',[CalenderEntriesController::class,'action']);

Route::get('/all-entries',[CalenderEntriesController::class,'AllEntries']);