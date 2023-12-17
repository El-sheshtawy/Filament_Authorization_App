<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        User::truncate();
        Role::truncate();
        Permission::truncate();


        DB::statement('SET FOREIGN_KEY_CHECKS=1');


        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Writer']);


        User::create([
            'name' => 'Mohamed Elsheshtawy',
            'email' => 'ramyalfe22@gmail.com',
            'password' => Hash::make('password'),
        ])->assignRole('Admin');

        User::create([
            'name' => 'Emad',
            'email' => 'emad@gmail.com',
            'password' => Hash::make('password'),
        ])->assignRole('Writer');

        User::create([
            'name' => 'Nada',
            'email' => 'nada@gmail.com',
            'password' => Hash::make('password'),
        ]);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);

        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'edit roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'edit permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list posts']);
        Permission::create(['name' => 'create posts']);
        Permission::create(['name' => 'edit posts']);
        Permission::create(['name' => 'delete posts']);


        Post::factory()->count(50)->create();
    }
}
