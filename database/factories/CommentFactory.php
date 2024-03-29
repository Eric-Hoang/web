<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'rate' => mt_rand(1, 5),
            'content' => $this->faker->sentence(mt_rand(10, 30)),
            'created_at' => $this->faker->dateTimeBetween('-30 days')
        ];
    }
}
