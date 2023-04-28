<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('treeview');
});

Auth::routes();

Route::middleware([CheckStatus::class])->group(function(){
	Route::get('categories', [App\Http\Controllers\CategoryController::class, 'allCategories'])->name('allCategories');
	Route::any('category/create', [App\Http\Controllers\CategoryController::class, 'createCategory'])->name('createCategory');
	Route::any('category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'editCategory'])->name('editCategory');
	Route::get('category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'deleteCategory'])->name('deleteCategory');

	Route::get('allUsers', [App\Http\Controllers\HomeController::class, 'users'])->name('allUsers');
	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::get('treeview',[App\Http\Controllers\CategoryController::class, 'treeView'])->name('treeview');




