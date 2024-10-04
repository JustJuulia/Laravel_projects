@extends('main')
@section('content')

<br><br>
<nav class="accordion arrows">
    <header class="box">
        <label for="acc-close" class="box-title">News and comments by our fellow community</label>
    </header>
    @foreach ($news as $newsx)
        <x-news_page n_title="{{$newsx['n_title']}}" n_author="{{$newsx->author->name}}" n_content="{{$newsx['n_content']}}" n_date="{{$newsx['n_date']}}" n_author_id="{{$newsx['n_author_id']}}"></x-news_page>

    @endforeach
<input type="radio" name="accordion" id="acc-close" />
</nav><br><br>
@auth
<b>WALIDACJA</b>
<a href="{{ route('news_form') }}" style="margin-left: 40%;"> ADD A COMENT</a>
@endauth
<style>
    .accordion {
        margin: auto;
        width: 1000px;
    }

    .accordion input {
        display: none;
    }

    .box {
        position: relative;
        background: white;
        height: 67px;
        transition: all .15s ease-in-out;
    }

    .box::before {
        content: '';
        position: absolute;
        display: block;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        pointer-events: none;
        box-shadow: 0 -1px 0 #e5e5e5, 0 0 2px rgba(0, 0, 0, .12), 0 2px 4px rgba(0, 0, 0, .24);
    }

    header.box {
        background: #9F956C;
        z-index: 100;
        cursor: initial;
        box-shadow: 0 -1px 0 #e5e5e5, 0 0 2px -2px rgba(0, 0, 0, .12), 0 2px 4px -4px rgba(0, 0, 0, .24);
    }

    header .box-title {
        margin: 0;
        font-weight: normal;
        font-size: 16pt;
        color: white;
        cursor: initial;
    }

    .box-title {
        width: calc(100% - 40px);
        height: 64px;
        line-height: 64px;
        padding: 0 20px;
        display: inline-block;
        cursor: pointer;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .box-content {
        width: calc(100% - 40px);
        padding: 30px 20px;
        font-size: 11pt;
        color: rgba(0, 0, 0, .54);
        display: none;
    }

    .box-close {
        position: absolute;
        height: 64px;
        width: 100%;
        top: 0;
        left: 0;
        cursor: pointer;
        display: none;
    }

    input:checked+.box {
        height: auto;
        margin: 16px 0;
        box-shadow: 0 0 6px rgba(0, 0, 0, .16), 0 6px 12px rgba(0, 0, 0, .32);
    }

    input:checked+.box .box-title {
        border-bottom: 1px solid rgba(0, 0, 0, .18);
    }

    input:checked+.box .box-content,
    input:checked+.box .box-close {
        display: inline-block;
    }

    .arrows section .box-title {
        padding-left: 44px;
        width: calc(100% - 64px);
    }

    .arrows section .box-title:before {
        position: absolute;
        display: block;
        content: '\203a';
        font-size: 18pt;
        left: 20px;
        top: -2px;
        transition: transform .15s ease-in-out;
        color: rgba(0, 0, 0, .54);
    }

    input:checked+section.box .box-title:before {
        transform: rotate(90deg);
    }
</style>
@endsection