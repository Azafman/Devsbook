<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\PostLike;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostLike>
 */
class PostLikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //$post = Post::all()->random();
        //$user = User::all()->random();
        /* function createRegister() {
            return [
                Post::all()->random(),
                User::all()->random()

            ];
        } */
        $hasRegister = false;
        $result = [
            Post::all()->random(),
        ];
        do {  
            $cont = 0;
            $result[1] =  User::all()->random();
            foreach(PostLike::all() as $postUnique) {
                $cont++;
                if($postUnique->post_id == $result[0] && $postUnique->user_id == $result[1]) {
                    //$user = User::all()->random();
                    $hasRegister = true;
                } 
                if($cont === User::count()) {
                    $result[0] = Post::all()->random();
                    $cont = 0;
                }
            } 
        } while($hasRegister !== false);
        /*function confira($post, $user) {
            foreach(PostLike::all() as $postUnique) {
                if($postUnique->post_id== $post && $postUnique->user_id == $user) {
                    $user = User::all()->random();
                } 
            }
        }*/
        return [
            'post_id' => $result[0],
            'user_id' => $result[1]
        ];

    }
}
