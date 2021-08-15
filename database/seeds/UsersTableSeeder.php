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
        $User = \App\User::create([
            'name'=>'احمد عبداللطيف',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('12345678'),
           ]);

    }
}
