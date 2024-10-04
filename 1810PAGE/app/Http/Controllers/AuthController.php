<?php

namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Funkcja wyświetlająca formularz logowania
    public function form()
    {
        return view('signin');
    }

    // Funkcja obsługująca proces logowania
    public function login(LoginRequest $request)
{
    $credentials = [
        'email' => $request->validated('email'),
        'password' => $request->validated('password'),
    ];

    if (Auth::attempt($credentials, $request->has('remember_me'))) {
        // Użytkownik zalogowany pomyślnie
        $request->session()->regenerate();

        if ($request->has('remember_me')) {
            return redirect()->intended('signin');
        } else {
            return redirect()->intended('home');
        }
    } else {
        // Błędne dane logowania
        return back()->withErrors([
            'login' => 'Login lub hasło nie są poprawne.'
        ]);
    }
}


    // Funkcja obsługująca proces wylogowywania
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Pomyślnie wylogowano');
    }
}
