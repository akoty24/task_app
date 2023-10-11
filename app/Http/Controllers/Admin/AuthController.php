<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('admin.auth.Login');
    }

    public  function Login(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('dashboard')->with('success', 'Login successful. Welcome, Admin!');
        }
        return redirect()->back()->with('success', 'Login failed. Please check your credentials.');
    }


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('index')->with('success', 'Logout successful.');
    }
}
