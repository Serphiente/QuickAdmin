<?php

use Illuminate\Database\Seeder;

class RegionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'nombre' => 'Arica y Parinacota', 'ordinal' => 'XV',],
            ['id' => 2, 'nombre' => 'Tarapacá', 'ordinal' => 'I',],
            ['id' => 3, 'nombre' => 'Antofagasta', 'ordinal' => 'II',],

        ];

        foreach ($items as $item) {
            \App\Region::create($item);
        }
    }
}
