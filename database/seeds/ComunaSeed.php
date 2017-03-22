<?php

use Illuminate\Database\Seeder;

class ComunaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'nombre' => 'Arica', 'provincia_id' => 1,],
            ['id' => 2, 'nombre' => 'Camarones', 'provincia_id' => 1,],
            ['id' => 3, 'nombre' => 'General Lagos', 'provincia_id' => 2,],
            ['id' => 4, 'nombre' => 'Putre', 'provincia_id' => 2,],
            ['id' => 5, 'nombre' => 'Alto Hospicio', 'provincia_id' => 3,],
            ['id' => 6, 'nombre' => 'Iquique', 'provincia_id' => 3,],

        ];

        foreach ($items as $item) {
            \App\Comuna::create($item);
        }
    }
}
