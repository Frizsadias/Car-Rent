<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Car;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        DB ::table('users')->insert([
            'name' =>'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'nomor_telepon' => '08123456789',
            'alamat' => 'Jl. Raya No. 1',
            'nomor_sim' => '123456789',
            'remember_token' => Str ::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    Car::factory(15) -> create();

    }
}
