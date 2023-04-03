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
        return $this->hasMany(PostComent::class, 'post_id', 'id');
    }
    public function posts_likes() {
        return $this->hasMany(PostLike::class, 'post_id', 'id');
    }
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    protected $table = 'posts';
    use HasFactory;
}
