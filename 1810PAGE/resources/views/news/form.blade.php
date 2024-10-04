@extends('main')
@section('content')
@auth
<h2>{{ isset($news) ? 'Edycja istniejącej publikacji' : 'Tworzenie publikacji' }}</h2>
<form action="{{ isset($news) ? route('news.update', ['news' => $news->id]) : route('news.store') }}" method="POST">
    @csrf

    @if(isset($news))
        @method('PUT')
    @endif

    <br><br>
    <label for="n_title">Tytuł:</label>
    <input type="text" name="n_title" id="n_title" value="{{ isset($news) ? old('n_title', $news->n_title) : old('n_title') }}">
    @error('n_title')
        <p>{{ $message }}</p>
    @enderror

    <br><br>
    <label for="n_content">Treść:</label>
    <textarea name="n_content" id="n_content" rows="4" cols="90">{{ isset($news) ? old('n_content', $news->n_content) : old('n_content') }}</textarea>
    @error('n_content')
        <p>{{ $message }}</p>
    @enderror

    <br><br>
    <label for="n_author_id">Autor:</label>
    <select name="n_author_id" id="n_author_id">
        <option value="">--Wybierz autora--</option>
        @foreach($users as $user)
            <option value="{{ $user->id }}" {{ isset($news) ? ($news->n_author_id == $user->id ? 'selected' : '') : (old('n_author_id') == $user->id ? 'selected' : '') }}>
                {{ $user->name }}
            </option>
        @endforeach
    </select>
    @error('n_author_id')
        <p>{{ $message }}</p>
    @enderror

    <br><br>
    <input type="submit">
</form>
@if(isset($news))
    <a href="{{ route('news.show', ['id' => $news->id]) }}" class="btn btn-primary mt-3">Powrót</a>
@else
    <a href="{{ route('news') }}" class="btn btn-primary mt-3">Powrót do listy</a>
@endif
@else
<h1> nie zalogowana osoba nie mozesz twporzyc niczego </h1>
@if(isset($news))
    <a href="{{ route('news.show', ['id' => $news->id]) }}" class="btn btn-primary mt-3">Powrót</a>
@else
    <a href="{{ route('news') }}" class="btn btn-primary mt-3">Powrót do listy</a>
@endif

@endauth

@endsection
