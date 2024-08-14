<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegisterController extends Controller
{
    /**
     * Instantiate a new LoginRegisterController instance.
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except([
    //         'logout',
    //         'dashboard'
    //     ]);
    // }

    public function register()
    {
        return view('site.register');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('mainsite')
            ->withSuccess('You have successfully registered & logged in!');
    }


    public function login()
    {
        return view('site.login');
    }


    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('index')
                ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');
    }


    public function mainsite()
    {
        if (Auth::check()) {
            $products = Products::get();
            $categories = Categories::get();

            return view('site.index', compact('products', 'categories'));
            // return view('site.mainsite');
        }

        // return redirect()->route('userlogin')
        //     ->withErrors([
        //         'email' => 'Please login to access the mainsite.',
        //     ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index')
            ->withSuccess('You have logged out successfully!');;
    }
}
