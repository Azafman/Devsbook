<?php

namespace Database\Factories;

use App\Models\PostLike;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostComent>
 */
class PostComentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = PostLike::all()->random();
        return [
            'post_id' => $user->post_id,
            'user_id' => $user->user_id,
            'body_coment' => $this->faker->text(45)
        ];
    }
}
