<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fotos extends Model
{
    use HasFactory;
    public $table = 'fotos';
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
