<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
       User::create([
            'name' => 'admin',
             'email' => 'admin@ehb.be',
             'password' => Hash::make('Password!321'),
            'is_admin' => true,
        ]);
    }
}