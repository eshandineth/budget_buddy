<?php
// app/Http/Controllers/Auth/LoginController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class LoginController extends Controller
{
    protected $redirectTo = '/'; // Redirect path for regular users after login

    public function showLoginForm()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Admin login
        $admin = Admin::where('email', $credentials['email'])->first();
        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            session()->flash('welcomeMessage', 'Welcome, Admin!');
            return redirect()->route('admin.dashboard');
        }

        // User login
        if (Auth::attempt($credentials)) {
            session()->flash('welcomeMessage', 'Welcome, ' . Auth::user()->name . '!');
            return redirect()->intended($this->redirectTo); // Using the $redirectTo property here
        }

        return redirect('/login')->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
