<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
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

    //create
    public function create()
    {
        return Inertia::render('Users/Create');
    }

    // store
    public function store(Request $request)
    {
        $request->validate([
            'data.name' => 'required',
            'data.email' => 'required|email',
            'data.password' => 'required|min:6',
        ]);

        $user = User::create([
            'name'=>$request->data['name'],
            'email'=>$request->data['email'],
            'password'=>Hash::make($request->data['password']),
        ]);

        // return Inertia::render('Users/Index');
        return redirect('users');

    }

}
