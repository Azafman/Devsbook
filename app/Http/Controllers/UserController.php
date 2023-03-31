<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostComent;
use App\Models\UserRelation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Extension\Table\Table;

class UserController extends Controller
{
    public function home() {
        //dd(Auth::user()->id);
        $user = Auth::user();
        $id = $user->id;
        $relations = UserRelation::where('user_from', '=', 38);
        $qndtAmigos = $relations->count();
        //dd($relations->get());
        $idPost = [];
        foreach($relations->get() as $item) {
            array_push($idPost, $item->getAttribute('user_id'));
        }
        array_push($idPost, $id);
        /* dd(Post::whereIn('user_id', $idPost)->get()); => eu fiz um where com valores de um array. Aqui eu, eu puxei os posts dos "amigos deste usuário e dele mesmo*/
        $posts = Post::whereIn('user_id', $idPost)->orderBy('id', 'desc')->get(); //ordenei em ordem decrescente os posts, o que me resulta que em primeiro lugar virá os últimos posts a serem postados.
        //dd($posts);
        //$comentsPost = PostComent::whereIn('post_id', $idPost);
        $comentsPost = DB::table('posts_coments')
                    ->select(['body_coment', 'users.name', 'posts_coments.post_id'])
                    ->join('posts','posts.id', '=', 'posts_coments.post_id')
                    ->whereIn('posts_coments.post_id', $idPost);


        $postsTwo = DB::Table('posts')
                        ->select(['posts.body', 'posts_coments.body_coment'])
                        ->join('posts_coments', 'posts_coments.post_id', '=', 'posts.id')
                        ->join('users', 'users.id', '=', 'posts_coments.user_id')
                        ->whereIn('posts.id', [62, 45, 50]);

        //dd($postsTwo->get());
        $users = DB::table('users')->select('name')->whereIn('id', $idPost)->get();
        //dd($posts[0]->getAttribute('body'));
        $cont = 0;
        $newAarray = [];
        foreach($idPost as $item) {
            $newAarray[$cont] = [
                $item,
                $users[$cont]->name,
                $posts[$cont]->body
            ];
            $cont++;
        }
        /* dd($newAarray); */
        //dd($idPost[0]);//um array com três posições
        //dd($idPost[0][1]);//um array com um atributo name e o name do usuário
        //dd($idPost[0][2]);//uma lista de atributos referentes a um post. Como se fosse Post::find(23);
        //dd($idPost[0][2]->id);//o atributo `id` do post gerado acima
        //dd($idPost);
        return view('feed', [
            'quantidadeAmigos' => $qndtAmigos,
            'posts' => $newAarray,
        ]);
        //o código comentado abaixo está testando os relacionamentos, dos models.
        /*  dd(\App\Models\PostComent::where('post_id', '=', 11)->get());
        dd(\App\Models\Post::find(11)->posts_coments);
        dd(\App\Models\Post::find(27)->posts_likes);
        dd($relations->get()[0]->user_from); */
    }
}
