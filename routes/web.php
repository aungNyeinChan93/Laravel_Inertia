<?php

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

Route::get("test/users",function(){
    $users = User::get()->toArray();
    return Inertia::render('Test',['users'=>$users,'time'=>Carbon::now()->toDateTimeString()]);
});

Route::post('logout',function(){
    return request()->name;
});
