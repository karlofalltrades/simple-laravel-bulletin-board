<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $primaryKey = 'comment_id';

    protected $fillable = [
        'article_id', 'content', 'created_at', 'updated_at',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
