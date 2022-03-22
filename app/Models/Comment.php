<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'reply_id',
        'question_id',
        'user_id',
        'author_id',
        'sequence',
        'content',
    ];

    public function reply()
    {
        return $this->belongsTo(Reply::class);
    }
}
