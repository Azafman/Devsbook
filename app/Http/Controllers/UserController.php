<?php

namespace App\Http\Controllers;

use App\Models\Fotos;
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
    public function home(){
        //dd(Auth::user()->id);
        $user = Auth::user();
        $id = $user->id;
        $relations = UserRelation::where('seguindo', '=', $id);
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
            foreach($posts[$contador]["coments"] as $coment) {
                $coment["autorComent"] = $coment->user;
            }
            $posts[$contador]["likes"] = $post->posts_likes;
            foreach($posts[$contador]["likes"] as $postLike) {
                $posts[$contador]["likes"]["autorLike"] = $postLike->user;
            }
            $posts[$contador]["author"] = $post->user;
            $contador++;
        }
        //dd($posts);
        //dd($posts[1]["coments"][0]->user); 
        //dd($posts[1]["coments"][0]->user->getAttribute("nome")); 

        return view('feed', [
            'name' => $user["name"],
            'quantidadeAmigos' => $qndtAmigos,
            'posts' => $posts,
        ]);
    }

    public function myProfile() {
        $idUser = Auth::user(); 
        $posts = Post::whereIn('user_id', $idUser)->get();
        $followOfThisUser = UserRelation::whereIn('seguindo', $idUser);
        $thisUserFollow = UserRelation::whereIn('user_id', $idUser);
        $userFotos = Fotos::whereIn('user_id', $idUser);


        $contador = 0;
        foreach ($posts as $post ) {
            $posts[$contador]["coments"] = $post->posts_coments;
            foreach($posts[$contador]["coments"] as $coment) {
                $coment["authorComent"] = $coment->user;
            }

            $posts[$contador]["likes"] = $post->posts_likes;
            foreach($posts[$contador]["likes"] as $postLike) {
                $posts[$contador]["likes"]["authorLike"] = $postLike->user;
            }

            $posts[$contador]["author"] = $post->user;
            $contador++;
        }
        return view('profile', [
            'user' => $idUser,
            'qtdAmigos' => $thisUserFollow->count(),
            'myPosts' => $posts, 
            'fotos' => $userFotos
        ]);
    }
    public function myFriends() {
        return view('amigos');
    }
    public function myPhotos() {
        return view('fotos');
    }
    public function config() {
        echo "config my account";
    }
}
