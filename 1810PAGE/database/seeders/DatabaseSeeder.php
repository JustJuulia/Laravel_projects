<?php
namespace Database\Seeders;
use Database\Factories\CommentFactory;
use Database\Factories\News_modFactory;
use App\Models\Comment;
use App\Models\News_mod;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory(10)->create()->each(function ($user) {
            $news = News_mod::factory(2)->create(['n_author_id' => $user->id]);
            $news->each(function ($newsItem) use ($user) {
                Comment::factory(3)->create([
                    'author_id' => $user->id,
                    'news_id' => $newsItem->id,
                ]);
            });
        });
    }
}
