<?php

namespace App\Http\Controllers;

use App\Models\UserRelation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home() {
        //dd(Auth::user()->id);
        $user = Auth::user();
        $id = $user->id;
        $relations = UserRelation::where('user_from', '=', 38);
        $qndtAmigos = $relations->count();
        /* dd(\App\Models\PostComent::where('post_id', '=', 11)->get()); */
        dd(\App\Models\Post::find(11)->posts_coments);
        dd(\App\Models\Post::find(27)->posts_likes);
        dd($relations->get()[0]->user_from);
        
        
        return view('feed', [
            'quantidadeAmigos' => $qndtAmigos,
            'name' => $user->name
        ]);
    }
}
