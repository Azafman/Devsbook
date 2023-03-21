<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserRelation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserRelation>
 */
class UserRelationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        $userOne = User::all()->random();
        $userTwo = User::all()->random();
        
        $validaty = false;
        $cont = 0;
        do {
            if($validaty) {
                $userTwo = User::all()->random();
            }
            foreach(UserRelation::all() as $relation)  {
                $cont++;
                if($relation->user_id === $userOne && $relation->user_from === $userTwo) {
                    $validaty = true;
                }
                if($cont === User::count()) {
                    $userOne = User::all()->random();
                }
            }

        } while($validaty);

        //DB::table('users_relations')->join('users','users_relations.user_id','!=','users.user_id')->select();
        
        return [
            'user_from' => $userTwo,
            'user_id' =>  $userOne
        ];
    }
}
