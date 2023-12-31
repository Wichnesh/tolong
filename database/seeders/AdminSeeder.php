<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Aravind',
                'email' => 'aravind@gmail.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Praveen',
                'email' => 'praveen@gmail.com',
                'password' => bcrypt('123456'),
            ],
        ];
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
