<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'nama' => 'Mochamad Dwi Febriansyah',
            'username' => '22670145',
            'email' => 'iniakunnyaorangjoos@gmail.com',
            'password' => '$2y$12$PXCrSbSMfSy0B.qM959r8uZIuf71.DQvpJRyQGXOMXGa85xH/lMWS',
            'tanggal_lahir' => 2024-06-15,
        ]);
    }
}
