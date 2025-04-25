<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
     // Tampilkan halaman login

     public function index()
    {
        return view('login');
    }

    public function showLoginForm()
    {
        return view('auth.login', ['css' => 'auth.css']);
    }
 
     // Login
     public function login(Request $request)
     {
         $credentials = $request->validate([
             'email' => 'required|email',
             'password' => 'required',
         ]);
 
         if (Auth::attempt($credentials)) {
             $request->session()->regenerate();
             return redirect()->intended('dashboard');
         }
 
         return back()->withErrors([
             'email' => 'The provided credentials do not match our records.',
         ]);
     }
 
     // Tampilkan halaman register 
     public function showRegisterForm()
     {
         return view('auth.register',[
            'css' => 'auth.css'
         ]);
     }
 
     // Register
     public function register(Request $request)
     {
         $validated = $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|string|email|max:255|unique:users',
             'password' => 'required|string|min:8|confirmed',
         ]);
 
         User::create([
             'name' => $validated['name'],
             'email' => $validated['email'],
             'password' => Hash::make($validated['password']),
         ]);
 
         return redirect()->route('login')->with('success', 'Registration successful. Please login.');
     }
 
     // Logout
     public function logout(Request $request)
     {
         Auth::logout();
 
         $request->session()->invalidate();
         $request->session()->regenerateToken();
 
         return redirect('/login');
     }
}
