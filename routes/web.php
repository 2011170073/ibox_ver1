<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CroppieController;
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




Route::get("/list",[PostController::class,"posts_list_view_2"])->name("list_2");
Route::get("/list/search",[SearchController::class,"post_list_search_view_2"])->name("list_search_2");
Route::get("/list/detail/{post}",[PostController::class,"post_detail_view_2"])->name("detail_2");
Route::get("/list/userprofile/{user_id}",[PostController::class,"user_profile_view_2"])->name("user_profile2");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get("/",[PostController::class,"posts_list_view"])->name("list");
    Route::get("/search",[SearchController::class,"post_list_search_view"])->name("list_search");
    #以下、プロフィール画面
    Route::get("/userprofile/{user_id}",[PostController::class,"user_profile_view"])->name("user_profile");
    Route::post("/useprofile/{user_id}/croppie",[CroppieController::class,"croppie_icon_store"])->name("icon_croppie");
    Route::post("/useprofile/{user_id}/croppie/edit",[CroppieController::class,"croppie_icon_edit_store"])->name("icon_croppie_edit");
    
    
    Route::get("/detail/{post}",[PostController::class,"post_detail_view"])->name("detail");
    Route::post("/detail/{post}/comment/store",[CommentController::class,"post_comment_store"])->name("comment_store");
    
    Route::get("/create",[PostController::class,"post_create_view"])->name("create");
    Route::post("/create/store",[PostController::class,"post_store_view"])->name("store");
    Route::get("/mylist/{user_id}",[PostController::class,"post_mylist_view"])->name("mylist");
    
    Route::delete("/delete/{post}",[PostController::class,"post_delete_view"])->name("delete");
    
    Route::get("/mylist/edit/{post}",[PostController::class,"post_edit_view"])->name("edit");
    Route::put("/mylist/edit/{post}/store",[PostController::class,"post_edit_store"])->name("edit_store");
    
    Route::get("/userlist",[FollowController::class,"user_list_view"])->name("userlist");
    
    Route::get("/userlist/search",[SearchController::class,"user_list_search_view"])->name("user_search");
    Route::post("/userlist/dofollow/{user}",[FollowController::class,"do_follow_store"])->name("dofollow");
    Route::delete("/userlist/unfollow/{user}",[FollowController::class,"un_follow_store"])->name("unfollow");
    
    Route::get("/mylike",[LikeController::class,"post_like_view"])->name("mylike");
    Route::post("/list/dolike/{post}",[LikeController::class,"do_like_store"])->name("dolike");
    Route::delete("/list/unlike/{post}",[LikeController::class,"un_like_store"])->name("unlike");
    
  
});

require __DIR__.'/auth.php';
