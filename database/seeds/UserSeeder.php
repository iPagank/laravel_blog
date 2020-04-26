<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Гость',
                'email' => 'guest@Gguest.com',
                'role' => 'guest',
                'password' => bcrypt('qwerty'),

            ],
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'role' => 'admin',
                'password' => bcrypt('admin')
            ]
        ];
        DB::table('users')->insert($data);
    }
}
