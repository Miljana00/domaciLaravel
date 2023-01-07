<?php

namespace Database\Seeders;

use App\Models\Parfem;
use Illuminate\Database\Seeder;

class Parfemi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 25; $i++){
            Parfem::create([
                'naziv' => ucfirst($faker->word()),
                'proizvodjacID' => $faker->numberBetween(1,4),
                'polID' => $faker->numberBetween(1,3),
                'cena' => $faker->numberBetween(5000,30000)
            ]);
        }
    }
}
