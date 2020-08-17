<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        User::create([
            'id' => 1,
            'name' => 'user',
            'email' => 'user@user',
            'password' => '$2y$10$jRMjMlZNwdmABr00nCIJMOu98cV7ziTUd5RXytQ3lxvn02AaLxh3G',
            'role_id' => 2,
//            'token' => 'hgoashfpgihsô'
        ]);

        User::create([
            'id' => 2,
            'name' => 'admin',
            'email' => 'admin@admin',
            'password' => '$2y$10$jRMjMlZNwdmABr00nCIJMOu98cV7ziTUd5RXytQ3lxvn02AaLxh3G',
            'role_id' => 1,
//            'token' => '1ferhstfhvrtzvr654'
        ]);
    }
}
