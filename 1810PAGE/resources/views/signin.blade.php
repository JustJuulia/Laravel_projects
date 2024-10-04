@extends('main')
@section('content')
<div class="w-20 h-10 inline-block float-left"></div>
<div class="float-left inline-block mt-24" style="height: 400px">
    <img class="rounded-lg" src="https://i.pinimg.com/564x/75/fd/58/75fd581389f84e923bcb82cac58624db.jpg" style="height: 400px; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);">
</div>
<div class="w-28 h-10 inline-block float-left"></div>
<div class="float-left inline-block border-double border-4 border-black rounded-lg m-auto w-2/6 mt-20 text-center" style="height:430px">
<br>    
<p class="font-['Consolas'] text-2xl mt-2"><b> Sɪɢɴ ɪɴ ᴛᴏᴅᴀʏ!</b></p>
    <div class="flex items-center justify-center">
        <div class="inline-block text-left mt-10 flex">


<b>WALIDACJA</b>
        @auth
    <h1>Witaj <strong>{{ Auth::user()->name }}</strong>!</h1>
@else
    <p>Nie jesteś zalogowany.</p>
@endauth

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <input id="email" type="email" name="email" required autocomplete="email" autofocus><br><br>

        <input id="password" type="password" name="password" required autocomplete="current-password"><br><br>

        <input type="checkbox" name="remember_me">Remember me</input><br>

        @error('login')
            <span>{{ $message }}</span>
        @enderror

        <input type="submit"></input>
    </form>
        </div>
        <div class="inline-block w-1/6"></div>
        <div class="inline-block w-2/6 mb-10">
            <img src="singinflower.jpg">
        </div>
    </div>
</div>
<div class="w-28 h-10 inline-block float-left"></div>
<div class="float-left inline-block mt-24" >
    <img class="rounded-lg" src="https://i.pinimg.com/564x/75/fd/58/75fd581389f84e923bcb82cac58624db.jpg" style="height: 400px; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);">
</div>
<style>
    .button-30 {
        align-items: center;
        appearance: none;
        background-color: #FCFCFD;
        border-radius: 4px;
        border-width: 0;
        box-shadow: rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
        box-sizing: border-box;
        color: #36395A;
        cursor: pointer;
        display: inline-flex;
        font-family: "JetBrains Mono", monospace;
        height: 48px;
        justify-content: center;
        line-height: 1;
        list-style: none;
        overflow: hidden;
        padding-left: 16px;
        padding-right: 16px;
        position: relative;
        text-align: left;
        text-decoration: none;
        transition: box-shadow .15s, transform .15s;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        white-space: nowrap;
        will-change: box-shadow, transform;
        font-size: 18px;
    }

    .button-30:focus {
        box-shadow: #D6D6E7 0 0 0 1.5px inset, rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
    }

    .button-30:hover {
        box-shadow: rgba(45, 35, 66, 0.4) 0 4px 8px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
        transform: translateY(-2px);
    }

    .button-30:active {
        box-shadow: #D6D6E7 0 3px 7px inset;
        transform: translateY(2px);
    }
</style>

@endsection
