<?php

namespace Database\Seeders;

use App\Models\PowerGridDemo\Kitchen;
use Illuminate\Database\Seeder;

class KitchenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kitchen::insert([
            ['description' => 'SP'],
            ['description' => 'RJ'],
            ['description' => 'MG'],
            ['description' => 'BA'],
        ]);
    }
}
