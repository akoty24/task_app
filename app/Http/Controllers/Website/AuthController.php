<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('website.auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $validatedData = $request->validated();
        if ($validatedData['password']) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }
        $user = User::create($validatedData);
        Auth::login($user);
        return redirect()->route('tasks.index')->with('success', 'Registration successful. Welcome');
    }

    public function loginForm()
    {
        return view('website.auth.Login');
    }

    public  function Login(LoginRequest $request)
    {
        $credentials =$request->validated();

        if (Auth::attempt($credentials)) {
            return redirect()->route('tasks.index')->with('success', 'Login successful. Welcome!');
        }
        return redirect()->back()->with('success', 'Login failed. Please check your credentials.');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.login.form')->with('success', 'Logout successful.');
    }

}
