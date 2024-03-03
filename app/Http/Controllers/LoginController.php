<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }

        // Авторизация не удалась
        return back()->withErrors(['email' => 'Неправильний логін або пароль'])->withInput();
    }

    public function logout() {
        Auth::logout();

        return redirect('/login');
    }
}
