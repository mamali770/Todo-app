<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TodoController::class , 'index'])->name('todo');
Route::get('/create', [TodoController::class , 'create'])->name('todo.create');
Route::post('/create', [TodoController::class , 'store'])->name('todo.store');
Route::get('/show/{id}', [TodoController::class , 'show'])->name('todo.show');
Route::get('/edit/{id}', [TodoController::class , 'edit'])->name('todo.edit');
Route::put('/update/{id}', [TodoController::class , 'update'])->name('todo.update');
Route::delete('/destroy/{id}', [TodoController::class , 'destroy'])->name('todo.destroy');
Route::get('/complete/{id}', [TodoController::class , 'complete'])->name('todo.complete');

Route::get('/category/create', [CategoryController::class , 'create'])->name('category.create');
Route::post('/category', [CategoryController::class , 'store'])->name('category.store');
Route::get('/category', [CategoryController::class , 'index'])->name('category.index');
Route::get('/category/{id}/edit', [CategoryController::class , 'edit'])->name('category.update');
Route::put('/category/{id}', [CategoryController::class , 'update'])->name('category.update.db');
Route::delete('/category/{id}/destroy', [CategoryController::class , 'destroy'])->name('category.destroy');