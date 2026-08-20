<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Mohammad',
            'email' => 'mohammad@gmail.com', // أو البريد الذي تفضله
            'password' => Hash::make('123456789123456789'),
        ]);
    }
}
