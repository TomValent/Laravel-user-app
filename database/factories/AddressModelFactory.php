<?php

namespace Database\Factories;

use App\Models\AddressModel;
use App\Models\UserModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class AddressModelFactory
 *
 * @namespace Database\Factories
 *
 * @author Tomas Valent
 *
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AddressModel>
 */
class AddressModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userId = UserModel::all()->random()->id;

        return [
            AddressModel::USER_ID      => $userId,
            AddressModel::STREET       => $this->faker->streetAddress,
            AddressModel::CITY         => $this->faker->city,
            AddressModel::ZIP          => $this->faker->postcode,
            AddressModel::COUNTRY      => $this->faker->country,
            AddressModel::COUNTRY_CODE => $this->faker->countryCode,
            AddressModel::EMAIL        => $this->faker->email,
            AddressModel::PHONE        => $this->faker->phoneNumber,
            AddressModel::CREATED_AT   => now(),
            AddressModel::UPDATED_AT   => now(),
        ];
    }
}
