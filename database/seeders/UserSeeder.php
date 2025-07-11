<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(20)->create();

        User::factory()->create([
            'name' => 'Testing User',
            'email' => 'user@example.com',
            'password' => bcrypt('12345678'),
            'role' => 'pm',
            'phone' => '1234567890',
        ]);
    }
}
