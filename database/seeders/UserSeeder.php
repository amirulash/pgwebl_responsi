<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // //Create a new user
        //  $user = new \App\Models\User();
        //  $user->name = 'Admin';
        //  $user->phone = '082133665917';
        //  $user->email = 'amirulfahmiash-shiddiqie@mail.ugm.ac.id';
        //  $user->password = bcrypt('admin1234');
        //  $user->save();

        //Create multiple users
        $user =[
            [
                'name' => 'Fahmi',
                'phone' => '081234567890',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('fahmi123'),
            ],
            [
                'name' => 'FahmiUser',
                'phone' => '081234567891',
                'email' => 'user@gmail.com',
                'password' => bcrypt('123456'),
            ],
        ];

    DB::table('users')->insert($user);
    }
}
