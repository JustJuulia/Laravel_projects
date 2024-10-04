@extends('main')
@section('content')
<div class="float-right inline-block">
    <img class="h-1/4" src="hearttoheart.jpg">
</div>
<h1 class="font-serif text-6xl mt-20 ml-40">
    <b>Your Healthy Life <br>Grows Here</b>
</h1>
<p class="ml-40 mt-10">Lorem ipsum dolor, sit amet consectetur adipisicing.
    <br>Porro quia dicta nemo dignissimos eveniet!
    <br>debitis architecto temporibus perferendi
    <br>molestias quas esse magnam.
</p>
<div class="font-bold rounded-3xl text-center ml-40 mt-12 w-60 h-20 inline-block text-2xl font-mono text-white bg-lime-600">
    <p class="ml-auto">
    <div class="mt-5 uppercase type--a"><a href="{{ route('articles') }}"> fresh flower info</a></div>
    </p>
</div>
<b>WALIDACJA</b>
@auth
    <h1>Witaj <strong>{{ Auth::user()->name }}</strong>!</h1>
    <form action="{{ route('auth.logout') }}" method="POST">
        @csrf
        <input type="submit" value="Wyloguj" />
    </form>
@else
    <a href="{{ route('auth.login') }}">Logowanie</a>
@endauth
<br><br><br><br><br><br>
<div class="reveal inline-block ml-32 mt-32">
    <div class=" reveal float-left inline-block ">
        <img class="h-64 w-72 pl-20 rounded-full" src="https://i.pinimg.com/564x/b8/bd/ba/b8bdba1375677ab5b159a67d6dbe62e4.jpg">
    </div>
    <div class=" reveal inline-block">
        <img class="h-64 w-72 pl-20 rounded-full" src="https://i.pinimg.com/564x/a8/db/ab/a8dbabbbbbfb65670aa3c341bc5215d5.jpg">
    </div>
    <div class="reveal inline-block">
        <img class="h-64 w-72 pl-20 rounded-full" src="https://i.pinimg.com/564x/ad/b9/78/adb978739a50aa9081fc15d03b4a33d5.jpg">
    </div>
    <div class="reveal float-right inline-block">
        <img class="h-64 w-72 pl-20 rounded-full" src="https://i.pinimg.com/564x/35/c1/bb/35c1bbe87833986e21c6df667f5a1184.jpg">
    </div>
</div>
<div class="reveal inline-block ml-40 mt-12 text-center">
    <div class="reveal float-left inline-block h-64 w-64">
        <b>here are some<br>flowers</b>
    </div>
    <div class="reveal float-center inline-block h-64 w-64 ml-12 ">
        <b>here is some very<br>cool art</b>
    </div>
    <div class="reveal inline-block h-64 w-64 ml-8">
        <b>more flowas<br>pretty</b>
    </div>
    <div class="reveal float-right inline-block h-64 w-64 ml-8">
        <b>renesaince<br>woman</b>
    </div>
</div>

@endsection