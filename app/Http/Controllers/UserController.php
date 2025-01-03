<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //user index
    public function index()
    {
        $users = User::query()
            ->when(request()->search, function ($query) {
                $query->whereAny(['name', 'email'], 'like', "%" . request()->search . "%");
            })
            ->paginate(9)
            ->withQueryString()
            ->through(fn($user) => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                "created_at" => $user->created_at->diffForHumans(),
                "updated_at" => $user->updated_at->diffForHumans(),
            ]);

        return Inertia::render('Users/Index', [
            'users' => $users
        ]);
    }

    //show
    public function show($id)
    {
        // dd(User::find($id));
        return Inertia::render('Users/Show', [
            'user' => User::find($id)->toArray(),
        ]);
    }

    //destory
    public function destory($id)
    {
        User::find($id)->delete();
    }

}
