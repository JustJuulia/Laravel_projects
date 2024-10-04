@extends('main')

@section('content')
<div class="center-content">
    <div class="center-content-inner">
        <h1>{{ $news->n_title }}</h1>
        <p>Autor: {{ $author->trashed() ? 'Usunięty użytkownik' : $author->name }}</p>
        <p>Data publikacji: {{ $news->n_date }}</p>

        <div>
            {!! $news->n_content !!}
        </div>
        <h2>Komentarze:</h2>
        @foreach($comments as $comment)
        <div>




            <p>
                @if ($comment->author)
                @if ($comment->author->trashed())
                <span style="color: red; text-decoration: line-through;">{{ $comment->author->name }}</span> (Usunięty użytkownik)
                @else
                {{ $comment->author->name }}
                @endif
                @else
                Brak dostępnych informacji o autorze
                @endif
            </p>
            <p>{{ $comment->text }}</p>
            <form action="{{ route('comments.destroy', ['comment' => $comment->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Usuń</button>
    </form>
        </div>
        @endforeach
        <form action="{{ route('comments.store', ['news' => $news->id]) }}" method="POST">
            @csrf
            <textarea name="text" placeholder="Napisz komentarz..." required></textarea>
            <button type="submit">Wyślij</button>
        </form>
        <a href="{{ route('news.edit', ['news' => $news->id]) }}">Edytuj news</a>
        <a href="{{ route('news') }}" class="btn btn-primary mt-3">Powrót do listy artykułów</a>
        <form action="{{ route('news.destroy', ['news' => $news->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Usuń</button>
        </form>
    </div>
</div>
<style>
    .center-content {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 60vh;
    }

    .center-content-inner {
        max-width: 600px;
    }
</style>
@endsection