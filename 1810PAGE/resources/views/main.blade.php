<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>JustJuliasProj</title>
    <link rel="icon" href="https://i.pinimg.com/564x/23/20/c1/2320c1a40072d72d8e9adcebbc52b9ab.jpg">
    @yield('style')
</head>

<body class="bg-amber-200 font-serif">
    <style>
        ::-webkit-scrollbar {
            width: 15px;
        }
        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background: white;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: grey;
        }

        .reveal {
            transform: translateY(150px);
            opacity: 0;
            transition: 2s all ease;
        }

        .reveal.active {
            transform: translateY(0);
            opacity: 1;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function reveal() {
                var reveals = document.querySelectorAll(".reveal");

                for (var i = 0; i < reveals.length; i++) {
                    var windowHeight = window.innerHeight;
                    var elementTop = reveals[i].getBoundingClientRect().top;
                    var elementVisible = 150;

                    if (elementTop < windowHeight - elementVisible) {
                        reveals[i].classList.add("active");
                    } else {
                        reveals[i].classList.remove("active");
                    }
                }
            }

            window.addEventListener("scroll", reveal);
        });
    </script>
    <header class="font-mono  italic text-2xl uppercase flex ">
        <strong class="flex">
            <div class="flex-initial ml-200 inline-block ">
                <a href="{{ route('home') }}"><img src="/jjproj.png" class="h-14 w-17 flex-1"></a>
            </div>
            <div class="ml-40 mt-5 inline-block ">
                <a href="{{ route('home') }}">home </a>
                <div class="w-10 inline-block"></div>
                <a href="{{ route('articles') }}">articles</a>
                <div class="w-10 inline-block"></div>
                <a href="{{ route('news') }}">news</a>
                <div class="w-10 inline-block"></div>
                <a href="{{ route('experts') }}">experts</a>
                <div class="w-80 inline-block"></div>
                <a href="{{ route('signin') }}">sign in</a>
                <div class="w-2 inline-block"></div>
                <a href="{{ route('signup') }}">sign up</a>

            </div>
        </strong>
    </header>
    @include('alerts')
    @yield('content')

    <footer class="w-fit text-center mt-22" >
        <strong>
            <div class="inline-block">
                <img src="/jjproj.png" class="mb-6 inline-block h-14 w-17">
            </div>
            <div class="text-center inline-block ml-24 h-14 mt-24">
                MADE BY JustJulia
            </div>
            <div class="text-right inline-block ml-24 h-14 mt-24">
                2023 COPYRIGHTED
            </div>
        </strong>
    </footer>

</body>

</html>