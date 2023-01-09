<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;


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





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get("/",[PostController::class,"posts_list_view"])->name("list");
    Route::get("/detail/{post}",[PostController::class,"post_detail_view"])->name("detail");
    Route::get("/create",[PostController::class,"post_create_view"])->name("create");
    Route::post("/create/store",[PostController::class,"post_store_view"])->name("store");
    Route::get("/mylist/{user_id}",[PostController::class,"post_mylist_view"])->name("mylist");
    
    Route::delete("/delete/{post}",[PostController::class,"post_delete_view"])->name("delete");
    
    Route::get("/mylist/edit/{post}",[PostController::class,"post_edit_view"])->name("edit");
    Route::put("/mylist/edit/{post}/store",[PostController::class,"post_edit_store"])->name("edit_store");
});

require __DIR__.'/auth.php';
