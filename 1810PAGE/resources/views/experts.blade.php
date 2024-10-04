@extends('main')
@section('content')
@foreach ($experts as $publicationx)
<x-experts_page :author="$publicationx['author']" :text="$publicationx['text']" :photourl="$publicationx['photourl']" />
@endforeach
@endsection