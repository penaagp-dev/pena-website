<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create(array(
            'id' => rand(100, 500),
            'uuid' => 'b0f692cf-5679-4948-8ddb-190d7c96c209',
            'name' => 'Admin PENAKU',
            'email' => 'penakuagp@gmail.com',
            'password' => Hash::make('7Owarz4t1XvJ&%%AR359'),
        ));
    }
}
