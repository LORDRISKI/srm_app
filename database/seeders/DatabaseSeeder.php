<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin SRM',
            'email' => 'admin@bpstrade.id',
            'password' => bcrypt('password'), // Ganti dengan sandi pilihan Anda
        ]);
    }
}