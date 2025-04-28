<?php
namespace App\Observers;

use App\Models\User;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Log; // Import Log di sini

class UserObserver
{
    public function created(User $user)
    {
        // Menambahkan log untuk melihat jika observer dijalankan
        Log::info('User Observer: User Created', ['user_id' => $user->id, 'role' => $user->role]);

        if ($user->role === 'admin') {
            Pengguna::create([
                'user_id' => $user->id,
            ]);
        }
    }
}
