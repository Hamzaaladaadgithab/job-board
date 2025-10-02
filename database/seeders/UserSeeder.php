<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'root@admin.com',
            'role' => 'admin',
            'password'=> Hash::make('12345678')
        ]);


        User::factory()->create([
            'name' => 'Editor Man',
            'email' => 'man@editor.com',
            'role' => 'editor',
            'password'=> Hash::make('12345678')
        ]);

        User::factory()->create([
            'name' => 'Editor Woman',
            'email' => 'woman@editor.com',
            'role' => 'editor',
            'password'=> Hash::make('12345678')
        ]);
    }
}

