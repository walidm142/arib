<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Department::create([
            'name' => "Sales",
        ]);

        \App\Models\User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'test@test.com',
            'password' => Hash::make('TE$T@@!234!'),
            'manager_id' => 0,
            'department_id' => 1,
            'salary' => 100,
        ]);
    }
}
