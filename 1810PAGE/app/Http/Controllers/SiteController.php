<?php

namespace App\Http\Controllers;
use App\Models\News_mod;
use App\Models\User; // Dodaj tę linię

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home()
    {
        return view('home');
    }
    public function goodinfo()
    {
        return view('goodinfo');
    }
    public function abtuser($n_author_id)
    {
    $author = User::withTrashed()->find($n_author_id);

    if (!$author) {
        abort(404); // Lub inna obsługa braku użytkownika
    }

    $news_mods = News_mod::where('n_author_id', $n_author_id)->get();

    return view('about_user', ['author' => $author, 'news_mods' => $news_mods]);

}
}