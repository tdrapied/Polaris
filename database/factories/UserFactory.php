<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username' => "admin",
            'password' => '$2y$10$D9AdpfYhbKj5Tl8ZUav/HOP1KEL4KwQ7dP.3/Z9ROUPLQ8Qn89rTO', // admin
            'role' => "ADMIN",
        ];
    }
}
