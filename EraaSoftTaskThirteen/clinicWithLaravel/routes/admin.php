<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\MajorController;
use App\Http\Controllers\Admin\MessageController;
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


Route::get('/', function () {
    return view('admin.index');
});


Route::resource('/majors', MajorController::class);
Route::resource('/cities', CityController::class);

Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
Route::delete('/messages/destroy/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');
