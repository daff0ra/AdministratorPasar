<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminData = [
            'email'=> 'DaffaRafiAryaputra@gmail.com',
            'name' => 'DaffaRafiAryaputra',
            'password' =>Hash::make('sabunijo890')
        ];
    }
}
