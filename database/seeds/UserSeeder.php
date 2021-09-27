<?php

use App\User;
use Illuminate\Database\Seeder;
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
        //Membuat User menambah secara Increment
      User::create([
          'name' => 'Admin', 
          'email'=> 'admin123@gmail.com',
          'password' => Hash::make('Admin123.'),
          'role' => 'Admin',
      ]);

      User::create([
        'name' => 'Lennon', 
        'email'=> 'lennon123@gmail.com',
        'password' => Hash::make('Lenon123.'),
        'role' => 'User',
    ]);

    User::create([
        'name' => 'Herman', 
        'email'=> 'Herman123@gmail.com',
        'password' => Hash::make('Herman123.'),
        'role' => 'User',
    ]);

    User::create([
        'name' => 'Randy', 
        'email'=> 'Randy123@gmail.com',
        'password' => Hash::make('Randy123.'),
        'role' => 'User',
    ]);

    User::create([
        'name' => 'Geo Masagena', 
        'email'=> 'syahrun.baso@gmail.com',
        'password' => Hash::make('Geo123.'),
        'role' => 'User',
    ]);
    }
}
