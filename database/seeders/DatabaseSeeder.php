<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     *
     * Admin user is created only via: php artisan admin:create
     */
    public function run(): void
    {
        // Intentionally empty: do not create users here (single-admin policy).
    }
}
