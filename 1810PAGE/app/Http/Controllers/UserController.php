<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUser($id)
    {
        $user = User::findOrFail($id);
        $news_s = $user->news_us;

        return view('user.show', compact('user', 'news_s'));
    }

    public function index()
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }
    
    public function form()
    {
        return view('users.form');
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return view ('goodinfo');
    }
}
