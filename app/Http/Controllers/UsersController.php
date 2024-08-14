<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        Users::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect('/auth/login')->with('success', 'Registration successful! Please log in.');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // $credentials = $request->only('email', 'password');
        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     return redirect(route('site.index'));
        // }
        $user = Users::where('email', $request->email)->get()->first();
        // return $user;
        if ($user) {
            if ($user->password == $request->password) {
                $request->session()->regenerate();
                return redirect(route('index'));
            } else {
                return 'wrong data';
            }
        } else return back()->with('error', 'Invalid email. Please try again.');

        // return redirect('/login')->with('error', 'Invalid credentials. Please try again.');
    }
}
