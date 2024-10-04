@extends('main')
@section('style')
<style>
    .myflower {
        padding: 5px;
        border: 2px solid #000;
        /* Black border with a width of 1px */
        border-radius: 10px;
        /* Adjust the value to control the roundness of corners */
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
        /* Black shadow with a 5px horizontal and vertical offset and a 10px blur radius */
    }
    </style>
@endsection
@section('content')
<div class="flex justify-center gap-x-12">
@foreach ($articles as $publication)
<x-articles_page :title="$publication['title']" :text="$publication['text']" :photourl="$publication['photourl']" />
@endforeach
</div>
@endsection