<?php

namespace Database\Seeders;

use App\Models\AddressModel;
use App\Models\UserModel;
use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 *
 * @namespace Database\Seeders
 *
 * @author Tomas Valent
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        UserModel::factory()->count(5)->create();
        AddressModel::factory()->count(10)->create();
    }
}
