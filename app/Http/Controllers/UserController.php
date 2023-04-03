<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostComent;
use App\Models\User;
use App\Models\UserRelation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Extension\Table\Table;

class UserController extends Controller
{
    public function home()
    {
        //dd(Auth::user()->id);
        $user = Auth::user();
        $id = $user->id;
        $relations = UserRelation::where('user_from', '=', 38);
        $qndtAmigos = $relations->count();
        $idPost = [];
        foreach ($relations->get() as $item) {
            array_push($idPost, $item->getAttribute('user_id'));
        }
        array_push($idPost, $id);

        //dd($user["name"]); //-> funciona 
        //abaixo vou pegar os posts dos amigos desse usuário e seus respectivos comentários
        $posts = Post::whereIn('user_id', $idPost)->get();
        $contador = 0;
        foreach ($posts as $post) {
            $posts[$contador]["coments"] = $post->posts_coments;
            $posts[$contador]["likes"] = $post->posts_likes;
            $posts[$contador]["author"] = $post->user;
            $contador++;
        }
        //dd($posts[1]); 

        return view('feed', [
            'name' => $user["name"],
            'quantidadeAmigos' => $qndtAmigos,
            'posts' => $posts,
        ]);
    }
}

/*    $postsWithComents = DB::Table('posts')
       ->select(['posts.id', 'users.name', 'posts.body', 'users.created_at'])
       ->join('users', 'users.id', '=', 'posts.user_id')
       ->whereIn('posts.id', $idPost)->get();

   $coments = DB::table('posts_coments')
       ->select(['posts_coments.body_coment', 'users.name', 'posts.id'])
       ->join('posts', 'posts.id', '=', 'posts_coments.post_id')
       ->join('users', 'users.id', '=', 'posts_coments.user_id')
       ->whereIn('posts.id', $idPost)->get(); */