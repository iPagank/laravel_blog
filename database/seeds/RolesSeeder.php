<?php

use App\Models\Roles;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::create(['name' => 'admin']);

        Roles::create(['name' => 'author']);

        Roles::create(['name' => 'user']);
    }
}
