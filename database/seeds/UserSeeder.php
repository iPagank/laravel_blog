<?php

use App\Models\Roles;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Roles::where('name','admin')->first();
        $roleAuthor = Roles::where('name','author')->first();
        $roleUser = Roles::where('name','user')->first();

        $admin = User::create(
            [
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'password' => Hash::make('admin')
            ]
        );

        $author = User::create(
            [
                'name' => 'Author',
                'email' => 'author@mail.com',
                'password' => Hash::make('author')
            ]
        );

        $user = User::create(
            [
                'name' => 'User',
                'email' => 'user@mail.com',
                'password' => Hash::make('user')
            ]
        );

        $admin->role()->attach($roleAdmin);
        $author->role()->attach($roleAuthor);
        $user->role()->attach($roleUser);
    }
}
