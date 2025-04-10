<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Pengguna;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            Pengguna::updateOrCreate(
                ['user_id' => $user->id], // Cegah duplikasi
                [
                    'nama_pengguna' => $user->name,
                    'password' => $user->password, // Pakai password dari user
                ]
            );
        }
    }
}
