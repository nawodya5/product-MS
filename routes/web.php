<?php

use App\Http\Controllers\addItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





Route::get('/viewAddItems', [addItemController::class, 'index'])->name('viewAddItems');
Route::post('/addItem', [addItemController::class, 'addItem'])->name('addItem');
Route::get('/editItem/{id}', [addItemController::class, 'editItem'])->name('editItem');
Route::post('/updateItem/{id}', [addItemController::class, 'updateItem'])->name('updateItem');
Route::delete('/deleteItem/{id}', [addItemController::class, 'deleteItem'])->name('deleteItem');
Route::get('/getItemDescription/{id}', [addItemController::class, 'getItemDescription'])->name('getItemDescription');

