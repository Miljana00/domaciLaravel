<?php

namespace Database\Seeders;

use App\Models\Proizvodjac;
use Illuminate\Database\Seeder;

class Proizvodjaci extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proizvodjac::create([
            'proizvodjac' => 'Armani',
            'drzava' => 'Italija'
        ]);

        Proizvodjac::create([
            'proizvodjac' => 'Calvin Klein',
            'drzava' => 'SAD'
        ]);

        Proizvodjac::create([
            'proizvodjac' => 'Hugo Boss',
            'drzava' => 'Nemacka'
        ]);

        Proizvodjac::create([
            'proizvodjac' => 'Valentino',
            'drzava' => 'Italija'
        ]);


    }
}
