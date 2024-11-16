<?php

namespace Database\Factories;

use App\Models\UserModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class UserModelFactory
 *
 * @namespace Database\Factories
 *
 * @author Tomas Valent
 *
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserModel>
 */
class UserModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            UserModel::NAME       => $this->faker->name,
            UserModel::PASSWORD   => $this->faker->password,
            UserModel::EMAIL      => $this->faker->unique()->safeEmail,
            UserModel::CREATED_AT => now(),
            UserModel::UPDATED_AT => now(),
        ];
    }
}
