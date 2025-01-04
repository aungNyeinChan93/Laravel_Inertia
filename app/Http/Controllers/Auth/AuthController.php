<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //login
    public function login()
    {
        return Inertia::render('Auth/Login');
    }

    // loginProcess
    public function loginProcess(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!auth()->attempt($request->only('email', 'password'))) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
                'password' => 'The provided credentials do not match our records.',
            ]);
        }

        $user ? Auth::login($user) : '';

        return redirect('/');

    }

    //logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
