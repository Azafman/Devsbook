<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComent extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'user_id',
        'body_coment'
    ];
    protected $table = 'posts_coments';
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
