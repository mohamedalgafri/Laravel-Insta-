<?php

use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;


Route::get('/',function(){
    return view('welcome');
});

// Route::get('/posts',[PostsController::class,'index']);
// Route::get('/posts/create',[PostsController::class,'create']);
// Route::post('/posts',[PostsController::class,'store']);
// Route::get('/posts/{id}',[PostsController::class,'show']);
// Route::get('/posts/{id}/edit',[PostsController::class,'edit']);
// Route::put('/posts/{id}',[PostsController::class,'update']);
// Route::delete('/posts/{id}',[PostsController::class,'destroy']);


Route::get('/posts/trash',[PostsController::class,'index']);
Route::put('/posts/trash/{id}',[PostsController::class,'restore']);
Route::delete('/posts/trash/{id}',[PostsController::class,'forceDelete']);
Route::resource('/posts',PostsController::class);
