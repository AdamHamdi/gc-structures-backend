<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Admin account
        User::firstOrCreate(
            ['email' => 'adamhamdi12@gmail.com'],
            [
                'name'     => 'Admin GC Structures',
                'password' => Hash::make('password'),
            ]
        );

        $this->call([
            ServiceSeeder::class,
            ReferenceSeeder::class,
            TeamMemberSeeder::class,
        ]);
    }
}
