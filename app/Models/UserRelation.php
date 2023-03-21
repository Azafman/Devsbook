<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRelation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_from',
        'user_id'
    ];
    protected $table = 'users_relations';
}
