<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();

        Role::create([
            'id' => 1,
            'name' => 'admin',
            'description' => 'Administrator'
        ]);

        Role::create([
            'id' => 2,
            'name' => 'user',
            'description' => 'User'
        ]);
    }
}
