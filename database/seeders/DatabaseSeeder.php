<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $UserData = [
            'name' => 'ProjekRPL123',
            'password' => 'ProjekRPL123'
        ];

        $UserData['password'] = bcrypt($UserData['password']);

        User::create($UserData);
        $this->call(DataSeeder::class);
    }
}
