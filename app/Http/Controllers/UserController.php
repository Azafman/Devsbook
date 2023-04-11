<?php

namespace App\Http\Controllers;

use App\Models\Fotos;
use App\Models\Post;
use App\Models\PostComent;
use App\Models\User;
use App\Models\UserRelation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Extension\Table\Table;

class UserController extends Controller
{
    static $user;

    //pages
    public function home(){
        //dd(Auth::user()->id);
        $user = self::getUserAuth();
        $id = $user->id;
        //UserController = $id;
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

        return view('feed', [
            'name' => $user["name"],
            'quantidadeAmigos' => $qndtAmigos,
            'posts' => $posts,
            'fotoPerfil' => UserController::getProfilePhoto($user)
        ]);
    }
    public function myProfile() {
        $idUser = self::getUserAuth(); 
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
            'fotos' => $userFotos,
            'fotoPerfil' => UserController::getProfilePhoto($idUser)
        ]);
    }
    public function myFriends() {
        return view('amigos', [
            'fotoPerfil' => UserController::getProfilePhoto(self::getUserAuth())
        ]);
    }
    public function myPhotos() {
        return view('fotos', [
            'fotoPerfil' => UserController::getProfilePhoto(self::getUserAuth())
        ]);
    }
    public function config() {
        echo "config my account";
    }

    //functions normatials
    public static function getProfilePhoto(User $user) {
        $getPhotoProfile = DB::table('fotos')
        ->select('caminho_imagem')
        ->where([['type_foto', '=', 'perfil'], ['user_id', '=', $user->id]])
        ->get();
 
        try {
            $getPhotoProfile = 'storage/images/'.$getPhotoProfile[0]->caminho_imagem;
        }catch(Exception $e) {
            $getPhotoProfile = 'media/avatars/avatar.jpg';
        }
        return $getPhotoProfile;
    }
    public static function getUserAuth() {
        if(!self::$user) {
            //self::nome variavel => é o que uso para acessar a variável estática dessa classe.
            self::$user = Auth::user();
        } 
        return self::$user;
    }
    public static function closeUser() {
        self::$user = null;
        return true;
    }
}
