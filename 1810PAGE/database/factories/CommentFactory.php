<?php

namespace Database\Factories;
use app\Models\User;
use app\Models\News_mod;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'author_id' => User::factory(),
            'news_id' => News_mod::factory(),
            'text' => $this->faker->realText(),
        ];
    }
}
