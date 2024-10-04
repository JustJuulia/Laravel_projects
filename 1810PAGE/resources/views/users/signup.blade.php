@extends('main')
@section('content')
<div class="w-20 h-10 inline-block float-left"></div>
<div class="float-left inline-block mt-24" style="height: 400px">
    <img class="rounded-lg" src="https://i.pinimg.com/564x/75/fd/58/75fd581389f84e923bcb82cac58624db.jpg" style="height: 400px; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);">
</div>
<div class="w-28 h-10 inline-block float-left"></div>
<div class="float-left inline-block border-double border-4 border-black rounded-lg m-auto w-2/6 mt-20 text-center" style="height:430px">
    <p class="font-['Consolas'] text-xl mt-2"><b>Sign up today!</b></p>
    <div class="flex items-center justify-center">
        <div class="inline-block text-left mt-10 flex">
            <form method="POST" action="{{ route('register') }}" class="inline-block flex-none">
            @csrf
                <input type="text" name="name" placeholder="Name"><br><br>
                <input type="email" name="email" placeholder="Email"><br><br>
                <input type="password" name="password" placeholder="Password"><br><br>
                <input type="password" name="password_confirmation" placeholder="Confirm Password"><br><br>
                <div class="inline-block h-1/6"></div>
                <div class="button-30 ml-10 mt-10 text-2xl text-center border-solid border-2 bg-black border-black rounded-lg text-white"><input type="submit"></input></div>
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