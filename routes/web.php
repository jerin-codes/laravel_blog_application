<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashBoardController;

Route::redirect('/',"posts");

Route::resource('posts',PostController::class);
Route::get('user-posts/{user_id}',[DashBoardController::class,"getUserPosts"])->name("posts.user");
Route::middleware("auth")->group(function(){
    Route::get("/dashboard",[DashBoardController::class,'index'])->name('dashboard');
    Route::post("/logout",[AuthController::class,'logout'])->name('logout');
    

});


Route::middleware("guest")->group(function (){
    Route::get('/register',function(){
        return view('auth.register');
    })->name('register');
    Route::post('/register',[AuthController::class,'register']);
    
    Route::get("/login",function(){
            return view("auth.login");
    })->name("login");
    Route::post("/login",[AuthController::class,"login"])->name("login");

          

});

