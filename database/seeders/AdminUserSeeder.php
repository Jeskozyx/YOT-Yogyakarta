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
            ['email' => 'dev@superGODadmin.com'],
            [
                'name' => 'Developer',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'division' => 'GOD',
                'email_verified_at' => now(),
            ]
        );

        // User Admin Koordinator Teknologi
        User::updateOrCreate(
            ['email' => 'tech@admin.yot.com'],
            [
                'name' => 'Teknologi',
                'password' => Hash::make('123'),
                'role' => 'coordinator',
                'division' => 'TECHNOLOGY',
                'email_verified_at' => now(),
            ]
        );

        // User Admin Koordinator SOC
        User::updateOrCreate(
            ['email' => 'soc@admin.yot.com'],
            [
                'name' => 'Sosial',
                'password' => Hash::make('123'), // bebas mau diganti
                'role' => 'coordinator',
                'division' => 'SOCIAL',
                'email_verified_at' => now(),
            ]
        );

        // User Admin Koordinator Energy
        User::updateOrCreate(
            ['email' => 'energy@admin.yot.com'],
            [
                'name' => 'Energy',
                'password' => Hash::make('123'), // bebas mau diganti
                'role' => 'coordinator',
                'division' => 'ENERGY',
                'email_verified_at' => now(),
            ]
        );

        // User Admin Koordinator Green
        User::updateOrCreate(
            ['email' => 'green@admin.yot.com'],
            [
                'name' => 'Green',
                'password' => Hash::make('123'), // bebas mau diganti
                'role' => 'coordinator',
                'division' => 'GREEN',
                'email_verified_at' => now(),
            ]
        );

        // User Admin Koordinator Entrepreneurship
        User::updateOrCreate(
            ['email' => 'entrepreneurship@admin.yot.com'],
            [
                'name' => 'Entrepreneurship',
                'password' => Hash::make('123'), // bebas mau diganti
                'role' => 'coordinator',
                'division' => 'ENTREPRENEURSHIP',
                'email_verified_at' => now(),
            ]
        );

        // User Admin Koordinator Catalyst
        User::updateOrCreate(
            ['email' => 'catalyst@admin.yot.com'],
            [
                'name' => 'Catalyst',
                'password' => Hash::make('123'), // bebas mau diganti
                'role' => 'coordinator',
                'division' => 'CATALYST',
                'email_verified_at' => now(),
            ]
        );

        // User Admin Koordinator Marcomm
        User::updateOrCreate(
            ['email' => 'marcomm@admin.yot.com'],
            [
                'name' => 'Marcomm',
                'password' => Hash::make('123'), // bebas mau diganti
                'role' => 'coordinator',
                'division' => 'MARCOMM',
                'email_verified_at' => now(),
            ]
        );

        $this->command->info('Users created/updated successfully!');
        $this->command->info('1. Developer - dev@superGODadmin.com / password');
        $this->command->info('2. Teknologi - tech@admin.yot.com / 123');
        $this->command->info('3. Sosial - soc@admin.yot.com / 123');
        $this->command->info('4. Energy - energy@admin.yot.com / 123');
        $this->command->info('5. Green - green@admin.yot.com / 123');
        $this->command->info('6. Marcomm - marcomm@admin.yot.com / 123');
        $this->command->info('7. Catalyst - catalyst@admin.yot.com / 123');
        $this->command->info('8. Entrepreneurship - entrepreneurship@admin.yot.com / 123');
    }
}
