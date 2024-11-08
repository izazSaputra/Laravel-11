<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $userData = [
        [
            'nik' => 1234567890,
            'name' => 'Operator1',
            'username' => 'izaz',
            'email' => 'operator@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'telephone' =>  1234567890,
            'role' => 'operator',
            'remember_token' => Str::random(10),
            // 'password' => Hash::make('password'),
        ],
        [
            'nik' => 1234567890,
            'name' => 'Petugas1',
            'username' => 'zazi',
            'email' => 'petugas@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'telephone' =>  1234567890,
            'role' => 'petugas',
            'remember_token' => Str::random(10),
            // 'password' => Hash::make('password'),
        ],
        [
            'nik' => 1234567890,
            'name' => 'Masyarakat1',
            'username' => 'wasd',
            'email' => 'masyarakat@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'telephone' =>  1234567890,
            'role' => 'masyarakat',
            'remember_token' => Str::random(10),
            // 'password' => Hash::make('password'),
        ],
            
    ];
    foreach($userData as $key => $val){
        User::create($val);
    }
    }
}
