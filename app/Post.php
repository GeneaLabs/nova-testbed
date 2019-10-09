<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $fillable = [
        "body",
        "category_id",
        "title",
    ];

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
