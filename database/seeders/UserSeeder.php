<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        foreach(range(1,5) as $item){
            User::create([
                'name' => $faker->name,
                'email' => 'user'.$item.'@email.com',
                'password' => Hash::make('password'),
            ]);
        }
    }
}