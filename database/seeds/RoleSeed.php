<?php

use Illuminate\Database\Seeder;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'Administrador (puede crear otros usuarios)',],
            ['id' => 3, 'title' => 'Vendedor',],
            ['id' => 4, 'title' => 'Finanzas',],
            ['id' => 5, 'title' => 'Bodega',],

        ];

        foreach ($items as $item) {
            \App\Role::create($item);
        }
    }
}
