<?php

use App\Models\ClubCreation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubCreationController;
use App\Http\Controllers\ProductCreationController;
use App\Models\ProductCreation;

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
Route::get('/',function(){
return view('ClubCreation.list');
});

Route::get('edit-btn/{id}',[ClubCreationController::class,'edit']);
Route::resource('club', ClubCreationController::class);
Route::any('/update-club/{id}',[ClubCreationController::class,'update']);

// Route::get('/product',function(){
// return view('ProductCreation.list');
// });
Route::resource('products', ProductCreationController::class);
Route::get('edit-product/{id}',[ProductCreationController::class,'edit']);
Route::any('/update-product/{id}',[ProductCreationController::class,'update']);