<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAdminCommand extends Command
{
    protected $signature = 'admin:create
                            {name : Admin display name}
                            {email : Admin email}
                            {password : Admin password}';

    protected $description = 'Create the single admin user (fails if one already exists)';

    public function handle(): int
    {
        if (User::query()->exists()) {
            $this->error('An admin user already exists. Only one user is allowed.');

            return self::FAILURE;
        }

        User::query()->create([
            'name' => $this->argument('name'),
            'email' => $this->argument('email'),
            'password' => $this->argument('password'),
        ]);

        $this->info('Admin user created.');

        return self::SUCCESS;
    }
}
