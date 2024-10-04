<?php

namespace App\Http\Controllers;

use App\Models\News_mod;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, News_mod $news)
    {
        $validatedData = $request->validate([
            'text' => 'required|string|max:255',
        ]);
    
        // WALIDACJA
        if (Auth::check()) {
            $a = Auth::id(); 
        } else {
            $a = 2; 
        }
        $comment = new Comment();
        $comment->text = $validatedData['text'];
        $comment->news_id = $news->id;
        $comment->author_id = $a;
        $comment->save();

        return back()->with('success', 'Komentarz został dodany.');
    }

    public function destroy(Comment $comment)
{
    $comment->delete();

    return back()->with('success', 'Komentarz został usunięty.');
}
}
