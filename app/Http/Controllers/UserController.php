<?php

namespace App\Http\Controllers;

use App\Models\Fotos;
use App\Models\Post;
use App\Models\UserRelation;
use Illuminate\Database\Eloquent\Collection;

class UserController extends Controller
{
    static $user;

    public function home()
    {
        $user = GetDataUsers::getUserAuth();
        $id = $user->id;
        $relations = UserRelation::where('seguindo', '=', $id);
        $idPost = [];
        foreach ($relations->get() as $item) {
            array_push($idPost, $item->getAttribute('user_id'));
        }
        array_push($idPost, $id);

        return view('feed', [
            'user' => $user,
            'relations' => GetDataUsers::getRelations(),
            'posts' => self::getPosts($idPost),
            'fotoPerfil' => GetDataUsers::getProfilePhoto($user),
        ]);
    }
    public function myProfile()
    {
        $idUser = GetDataUsers::getUserAuth();
        $relations = GetDataUsers::getRelations();

        return view('profile', [
            'user' => $idUser,
            'myPosts' => self::getPosts([$idUser->id]),
            'fotos' => Fotos::whereIn('user_id', $idUser)->get(),
            'fotoPerfil' => GetDataUsers::getProfilePhoto($idUser),
            'relations' => $relations,
            'fotoCover' => GetDataUsers::getProfilePhoto(GetDataUsers::getUserAuth(), "cover")
        ]);
    }
    public function myFriends()
    {
        return view('amigos', [
            'user' => GetDataUsers::getUserAuth(),
            'fotoPerfil' => GetDataUsers::getProfilePhoto(GetDataUsers::getUserAuth()),
            'relations' => GetDataUsers::getRelations(),
            'fotoCover' => GetDataUsers::getProfilePhoto(GetDataUsers::getUserAuth(), "cover")
        ]);
    }
    public function myPhotos()
    {
        return view('fotos', [
            'user' => GetDataUsers::getUserAuth(),
            'fotoPerfil' => GetDataUsers::getProfilePhoto(GetDataUsers::getUserAuth()),
            'relations' => GetDataUsers::getRelations(),
            'fotoCover' => GetDataUsers::getProfilePhoto(GetDataUsers::getUserAuth(), "cover")
        ]);
    }
    public function config()
    {

        echo "config my account";
    }

    private static function getPosts(array $idPost) {
        $posts = Post::whereIn('user_id', $idPost)->get();
        
        $contador = 0;
        foreach ($posts as $post) {
            $posts[$contador]["coments"] = $post->posts_coments;
            foreach ($posts[$contador]["coments"] as $coment) {
                $coment["autorComent"] = $coment->user;
            }

            $posts[$contador]["likes"] = $post->posts_likes;
            foreach ($posts[$contador]["likes"] as $postLike) {
                $postLike["autorLike"] = $postLike->user;
            }

            $posts[$contador]["author"] = $post->user;
            $posts[$contador]["fotoPerfil"] = self::getFotoPerfilOfAPost($post->user->fotos);
            $contador++;
        }
        return $posts;
    }

    private static function getFotoPerfilOfAPost(Collection $fotos) {
        return $fotos->where('type_foto', '=', 'perfil');
    }
}
