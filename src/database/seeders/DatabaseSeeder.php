<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\PowerGridDemo\Chef;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            KitchenSeeder::class,
            CategorySeeder::class,
            RestaurantSeeder::class,
            ChefSeeder::class,
            DishSeeder::class,
            UserSeeder::class,
        ]);

        $chefCategories = [
            'Luan' => [1, 3, 4],
            'Dan' => [2, 5],
            'Vitor' => [5, 6],
            'Claudio' => [1, 6, 7],
        ];

        Chef::query()->get()->each(function (Chef $chef) use ($chefCategories) {
            $chef->categories()->attach($chefCategories[$chef->name]);
        });


        User::factory()->withPersonalTeam()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
