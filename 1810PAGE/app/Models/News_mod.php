<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class News_mod extends Model
{
    use HasFactory;
    protected $fillable = [
        'n_title',
        'n_author_id',
        'n_content',
        'n_date'

    ];
    protected function excerpt(): Attribute
    {
        return Attribute::make(get: fn ($value, $attributes) => substr($attributes['n_content'], 0, 69) . "przeczytaj wiecej");
    }
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'n_author_id')->withTrashed();
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'news_id');
    }
}
