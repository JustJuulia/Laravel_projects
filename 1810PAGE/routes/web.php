<?php

use Illuminate\Support\Facades\Route;
use App\Models\News_mod;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\CommentController;
//ZADANIE2:
Route::get('/admin', function () {
    $correctPassword = '123456';// super tajne i ciezkie haslo....
    $passwordFromQuery = request()->query('secret');
    if ($passwordFromQuery && $passwordFromQuery === $correctPassword) {
        echo 'Dostęp do admina udzielony!';
    } else {
        abort(403, 'Brak dostępu.');
    }
});
//KONIEC ZADANIA 2
Route::post('comments/{news}', [CommentController::class, 'store'])->name('comments.store');
Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::get('auth.login', [AuthController::class, 'form'])->name('auth.login');
Route::post('auth.logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('login', [AuthController::class, 'form'])->name('login.form');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('register', [UserController::class, 'register'])->name('register');
Route::get('goodinfo', [SiteController::class, 'goodinfo'])->name('goodinfo');
Route::get('/', [SiteController::class, 'home'])->name('home');
Route::get('home', [SiteController::class, 'home'])->name('home');
Route::get('/abtuser/{n_author_id}', [SiteController::class, 'abtuser'])->name('abtuser');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
Route::get('/form_add/create', [NewsController::class, 'create'])->name('news_form');
Route::post('/form_add', [NewsController::class, 'store'])->name('news.store');
Route::get('news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
Route::put('news/{news}', [NewsController::class, 'update'])->name('news.update');
Route::delete('news/{news}/destroy', [NewsController::class, 'destroy'])->name('news.destroy');
Route::get('articles', function () {
    $articles = [
        [
            'title' => 'Juniperus',
            'text' => 'The Juniper genus (Juniperus) includes approximately 70 evergreen species with different structures, along with trees, often pyramidal, there are many shrubs and even creeping plants. In young specimens, the leaves are needle-like, flattened; in some members of the genus.',
            'photourl' => 'https://i.pinimg.com/564x/1b/df/dc/1bdfdc0b855c1f4d54107c36398ab7a1.jpg',
        ],
        
        [
            
            'title' => 'Saintpaulia',
            'text' => 'Saintpaulia is one of the most common flowering houseplants due to its abundant and long - lasting - even year-round-flowering and a wide variety of flower colors. The genus comprises over 10 species native to Central and Southern Africa.',
            'photourl' => 'https://i.pinimg.com/564x/ff/e2/b5/ffe2b5ac7ac5fb3662f5c090794f7d70.jpg',
        ],
        [
            
            'title' => 'Verbascum',
            'text' => 'The genus Mullein, or Verbascum, has approximately 300 species - herbaceous and semi-shrubby biennial and perennial resistant plants, most of them are xerophytes, that is, adapted to life in arid conditions. They are characterized by erect peduncles; the leaves are covered with a thick white fluff.',
            'photourl' => 'https://i.pinimg.com/564x/c8/30/46/c83046cf5ee4d4ed9c39417ca205b4b2.jpg',
        ],
        [
            
            'title' => 'Osmanthus',
            'text' => '"Osmanthus wine tastes the same as i remeber, but where are those, who share the memory?"~old tea maker. The genus Osmanthus (Osmanthus) includes about 15 species of evergreen resistant shrubs and trees of slow growth, which reach a height of 5 m and are very valued for their decorative flowering and foliage.',
            'photourl' => 'https://i.pinimg.com/564x/8f/8f/2b/8f8f2b8e2e38587ee2bf0a6fa38d79ac.jpg',
        ],
    ];

    return view('articles', ['articles'=>$articles]);
})->name('articles');


//Route::get('news', 'NewsController@orderdaty')->name('news');
Route::get('news', [NewsController::class, 'orderdaty'])->name('news');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
// Route::get('news', function () {
//     $newsdata = News_mod::orderBy('n_date', 'desc')->get();
//         // Wybierz wszystkie istniejące rekordy.
//     //$news = Publication::all();
//     //$newsdata = News_mod::orderBy('n_date','desc')->first();

//     // To samo co wyżej, ale możemy wcześniej dopisać dodatkowe zapytania.
//     //$news = Publication::get();

//     // Wybierz pierwszy rekord z bazy danych.
//     //$news = Publication::first();
//     if($newsdata){
//         return view('news', ['news'=>$newsdata]);
//     }
    
// })->name('news');


Route::get('experts', function () {
    $experts = [
        [
            'author' => 'Lana Del Rey',
            'text' => 'I dont wanna live
            I dont wanna give you nothing
            Cause you never give me nothing back
            Why cant you be good for something?
            Not one shirt off your back
            Why cant you be good for something?',
            'photourl' => 'https://i.pinimg.com/564x/8e/0a/b3/8e0ab3321a7646e0f4b4cfd1c3703947.jpg',
        ],
        [
            'author' => 'Old Tea Maker',
            'text' => 'In a garden blooming with fragrant delight,
            Where the roses blush and the lilies grow white,
            Beneath the soft sun, in the afternoons hours,
            We sipped on sweet tea amidst colorful flowers.
            The teas amber glow in the porcelain cup,
            Amidst petals and leaves, wed gently sup,
            Their fragrant embrace, a harmonious dance,
            In natures own teahouse, a moments romance.',
            'photourl' => 'https://i.pinimg.com/564x/a5/e7/b8/a5e7b8d754dbe762122b70a648c0a192.jpg',
        ],
        [
            'author' => 'TvGirl',
            'text' => 'Are you sick of me?
            Would you like to be?
            Im tryin to tell you somethin
            Somethin that I already said (pls listen to tvgirl her music>>>>)',
            'photourl' => 'https://i.pinimg.com/564x/84/ff/b0/84ffb0f9c882db76068a668f16bf9a8f.jpg',
        ],
        [
            'author' => 'RealFlowerLover',
            'text' => 'Page has only real info, I use it on daily basis to flex on my friends with my latin knowledge though, please dont trust the old tea maker, i heard he tried to fake his own death, weird guy...',
            'photourl' => 'https://i.pinimg.com/564x/4d/b0/d6/4db0d65aceb8a47a3768a158eb49f022.jpg',
        ],
    ];
    return view('experts', [ 'experts'=>$experts]);
})->name('experts');
Route::get('signin', function () {
    return view('signin', [
    ]);
})->name('signin');
Route::get('signup', function () {
    return view('users.signup', [
    ]);
})->name('signup');

