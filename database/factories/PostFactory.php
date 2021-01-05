<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'image_url' => 'https://media1.tenor.com/images/730c85cb58041d4345404a67641fcd46/tenor.gif',
            'is_published' => $this->faker->boolean(50),
            'user_id' => 1, // user: admin
            'created_at' => $this->faker->dateTime('now')
        ];
    }
}
