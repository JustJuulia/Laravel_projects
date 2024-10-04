<?php

namespace App\Http\Controllers;
use App\Http\Requests\UpdateNewsRequest;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use App\Models\News_mod;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreNewsRequest;

class NewsController extends Controller
{
    public function index()
    {
        $newsy = News_mod::all();

        return view('news.index', [
            'news' => $newsy
        ]);
    }
    public function orderdaty()
    {
        $newsdata = News_mod::orderBy('n_date', 'desc')->get();
        // Wybierz wszystkie istniejące rekordy.
        //$news = Publication::all();
        //$newsdata = News_mod::orderBy('n_date','desc')->first();
        // To samo co wyżej, ale możemy wcześniej dopisać dodatkowe zapytania.
        //$news = Publication::get();
        // Wybierz pierwszy rekord z bazy danych.
        //$news = Publication::first();
        $newsdata->transform(function ($item) {
            $item->n_date = Carbon::parse($item->n_date)->diffForHumans();
            return $item;
        });

        return view('news', ['news' => $newsdata]);
    }
    public function show($id)
    {
        $news = News_mod::find($id);

        if (!$news) {
            abort(404);
        }

        $author = $news->author;

        return view('news.show', [
            'news' => $news,
            'author' => $author,
            'comments' => $news->comments,
        ]);
    }
    public function create()
    {
        $users = User::all(); // Pobierz wszystkich użytkowników

        return view('news.form', ['users' => $users]);
    }
    public function store(StoreNewsRequest $request)
{
    $data = $request->validated();

    // Stworzenie nowego obiektu News_mod z danymi z formularza
    $newNews = new News_mod($data);
    $newNews->n_date = now();
    // Zapisanie nowego obiektu do bazy danych
    $newNews->save();

    // Przekierowanie do widoku show z id nowo utworzonego newsa
    return redirect()->route('news.show', ['id' => $newNews->id])->with('success', 'dodana pomyślnie.');
}
    public function edit(News_mod $news)
{
    //AUTORYZACJA
    $this->authorize('update', $news);
    $users = User::all();

    return view('news.form', [
        'news' => $news,
        'users' => $users,
    ]);
}

public function update(UpdateNewsRequest $request, News_mod $news)
{
    $this->authorizeResource('update', $news);
    $data = $request->validated();

    $news->update($data);

    return redirect()->route('news.show', ['id' => $news->id])->with('success', 'zaktualizowana pomyślnie.');
}
public function destroy(News_mod $news)
    {
        $this->authorize('update', $news);
        // Usunięcie newsa
        $news->delete();

        // Przekierowanie z komunikatem potwierdzającym
        return redirect()->route('news')->with('success', 'News został usunięty');
    }
}
