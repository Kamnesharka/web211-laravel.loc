<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerPage() {
        return view('auth.register');
    }

    public function storeUser(Request $request) {
        $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'same:password'
        ]);

        User::create([
            'name' => $request->input("name"),
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route("auth.login-page")->with("success_register", "Вы успешно зарегистрировались. Теперь войдите в аккаунт");
    }

    public function loginPage() {
        return view("auth.login");
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            // $request->session()->regenerate;
            return redirect()->intended('.');

        }

        return back()->withErrors([
            'email' => 'Логин или пароль введен неверно!'
        ])->onlyInput('email');
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
