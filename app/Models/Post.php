<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'description',
        'sound',
        'category',
        'like_count',
        'unlike_count',
        'comment',
        'view_count',
        'status',
    ];
}
