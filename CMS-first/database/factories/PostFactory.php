<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
//            'user_id' => User::factory()->create(),//Relate this user id to the user model
            'title' => fake() ->sentence,
            'post_image' => fake() ->imageUrl('900', '300'),
            'body' => fake() -> paragraph(200)
        ];
    }
}
