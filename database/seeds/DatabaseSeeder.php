<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(RegionSeed::class);
        $this->call(ProvinciumSeed::class);
        $this->call(ComunaSeed::class);
        $this->call(RoleSeed::class);
        $this->call(UserSeed::class);

    }
}
