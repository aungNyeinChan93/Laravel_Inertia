<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Events\UserCreateEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //user index
    public function index()
    {
        $users = User::query()
            ->when(request()->search, function ($query) {
                $query->whereAny(['name', 'email'], 'like', "%" . request()->search . "%");
            })
            ->orderBy("created_at",'desc')
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
            'users' => $users,
            'can'=>[
                'test',
                'create'=>Auth::user()->name === 'admin',
                // 'delete'=>Gate::authorize('delete', auth()->user()),
            ]
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
        Gate::authorize('delete', auth()->user());
        User::find($id)->delete();
    }

    //create
    public function create()
    {
        Gate::authorize('create', auth()->user());
        return Inertia::render('Users/Create');
    }

    // store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'password'=>Hash::make($request['password']),
        ]);

        event(new UserCreateEvent($user));

        // return Inertia::render('Users/Index');
        return redirect('users');

    }

}
