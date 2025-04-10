<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat user Poli
        User::updateOrCreate(
            ['email' => 'poli@gmail.com'],
            [
                'name' => 'Poli',
                'password' => Hash::make('poli123'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]
        );

        // Buat user Boas
        User::updateOrCreate(
            ['email' => 'boas@gmail.com'],
            [
                'name' => 'Boas',
                'password' => Hash::make('boas123'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]
        );

        // Jalankan seeder tambahan jika ada
        $this->call([
            PenggunaSeeder::class,
        ]);
    }
}
