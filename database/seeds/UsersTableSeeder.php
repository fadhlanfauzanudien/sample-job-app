<?php

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
        $admin = new \App\User();
        $admin->firstname = 'admin';
        $admin->lastname = 'admin';
        $admin->email = 'admin@example.com';
        $admin->date_of_birth = new \Carbon\Carbon('1990-01-01');
        $admin->password = bcrypt('secretpassword');
        $admin->save();
    }
}
