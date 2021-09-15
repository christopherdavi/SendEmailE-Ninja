<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Estado::factory(2)->create();
        \App\Models\Usuario::factory(10)->create();
        \App\Models\User::factory(4)->create();
        \App\Models\Twuits::factory(2)->create();
        \App\Models\Rol::factory(2)->create();
        \App\Models\RolUsuario::factory(2)->create();
    }
}
