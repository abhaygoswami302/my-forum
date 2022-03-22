<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'user_id',
        'author_id',
        'sequence',
        'content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
