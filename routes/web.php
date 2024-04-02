<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;


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
    return view('welcome');
});

Route::post('/user_store', [UserController::class, 'store'])->name('studentstore');
Route::get('showusers', [UserController::class, 'show_users'])->name('showusers');
Route::get('showuserajax', [UserController::class, 'show_user_ajax'])->name('showuserajax');

Route::name('website.')->prefix('website')->group(function(){

    Route::get('Add-Student',[StudentController::class, 'view_std_page'])->name('addstudent');
    Route::post('Store-Student',[StudentController::class, 'store_student'])->name('storestudent');


});


