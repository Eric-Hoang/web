<?php

namespace Database\Factories;

use App\Models\App;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = App::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->words(6, true),
            'description' => $this->faker->sentence(200),
            'is_paid' => mt_rand(0, 1),
            'price' => mt_rand(5, 20) . ' $',
            'img_url' => 'https://source.unsplash.com/random?a' . mt_rand(1, 10000),
            'download_count' => mt_rand(1, 100000),
            'screen_shot' => [
                'https://source.unsplash.com/random?a' . mt_rand(1, 10000),
                'https://source.unsplash.com/random?a' . mt_rand(1, 10000),
                'https://source.unsplash.com/random?a' . mt_rand(1, 10000),
            ]
        ];
    }
}
