<?php

use App\Http\Controllers\UserController;
use Carbon\Carbon;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::get('/about', function () {
    return Inertia::render('About');
});

Route::get("test/users",action: function(){
    $users = User::all()->map(function($user) {
        return [
            'name'=>$user->name,
        ];
    });
    return Inertia::render('Test',['users'=>$users,'time'=>Carbon::now()->toDateTimeString()]);
});

Route::post('logout',function(){
    return request()->name;
});

Route::get('users',[UserController::class,'index']);
Route::get('users/create',[UserController::class,'create']);
Route::post('users/store',[UserController::class,'store']);
Route::get('users/{id}',[UserController::class,'show']);
Route::post('users/{id}',[UserController::class,'destory']);
    