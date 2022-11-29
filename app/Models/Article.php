<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'user_id',
        'picture',
    ];

    public function author()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
