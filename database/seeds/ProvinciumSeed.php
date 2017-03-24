<?php

use Illuminate\Database\Seeder;

class ProvinciumSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'nombre' => 'Arica', 'region_id' => 1,],
            ['id' => 2, 'nombre' => 'Parinacota', 'region_id' => 1,],
            ['id' => 3, 'nombre' => 'Iquique', 'region_id' => 3,],

        ];

        foreach ($items as $item) {
            \App\Provincium::create($item);
        }
    }
}
