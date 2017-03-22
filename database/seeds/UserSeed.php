<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Admin', 'email' => 'admin@admin.com', 'password' => '$2y$10$7u.FX578PPKEItsS.jBIbO3qusbbDfPgNgWubcXbv3P8lmxBPL0Yy', 'rut' => '16760351', 'dv' => '3', 'role_id' => 1, 'cuenta_banco' => '16760351', 'cuenta_tipo' => 'Cuenta Rut', 'remember_token' => '',],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
