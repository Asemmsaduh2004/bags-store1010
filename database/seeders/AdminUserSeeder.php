<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'     => 'صاحب المتجر',
            'email'    => 'admin@haghaibak.com', // الإيميل الذي ستسجل به
            'password' => Hash::make('12345678'),  // كلمة المرور
            'is_admin' => true,
        ]);
    }
}