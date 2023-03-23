<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'type',
        'body',
        'post_de'
    ];
    public function posts_coments() {
        return $this->hasMany(PostComent::class, 'post_id');
    }
    public function posts_likes() {
        return $this->hasMany(PostLike::class);
    }
    protected $table = 'posts';
    use HasFactory;
}
