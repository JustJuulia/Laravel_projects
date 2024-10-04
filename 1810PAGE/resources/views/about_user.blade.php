@extends('main')

@section('content')
<h1 class="{{ $author->trashed() ? 'deleted-user' : '' }}">{{ $author->name }}</h1>
    <p>Email: {{ $author->email }}</p>
    <p>Data utworzenia konta: {{ $author->created_at }}</p>
<style>.deleted-user {
    color: red;
    text-decoration: line-through;
}
</style>
    <h2>Opublikowane wpisy</h2>
    @foreach($news_mods as $news_mods)
        <a href="{{ route('news.show', ['id' => $news_mods->id]) }}">{{ $news_mods->n_title }}</a><br>
    @endforeach
@endsection
