<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // User Developer - update jika ada, buat jika tidak ada
        User::updateOrCreate(
            ['email' => 'dev@example.com'],
            [
                'name' => 'Developer',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        // User Admin Koordinator Teknologi - update jika ada, buat jika tidak ada
        User::updateOrCreate(
            ['email' => 'tech@admin.yot.com'],
            [
                'name' => 'Teknologi',
                'password' => Hash::make('123'), 
                'role' => 'coordinator',
                'email_verified_at' => now(),
            ]
        );

        $this->command->info('Users created/updated successfully!');
        $this->command->info('1. Developer - dev@example.com / password (Role: Admin)');
        $this->command->info('2. Teknologi - tech@admin.yot.com / password123 (Role: Coordinator)');
    }
}   