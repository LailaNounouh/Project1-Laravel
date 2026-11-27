<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    /**
     * Security fix (secrets management): the admin password is no longer hard-coded
     * in source control. It is read from the environment (ADMIN_PASSWORD in .env).
     * If it is not set, a random one-time password is generated and shown once
     * in the console, so no default credential exists in any environment.
     */
    public function run(): void
    {
        $email = env('ADMIN_EMAIL', 'admin@ehb.be');
        $password = env('ADMIN_PASSWORD');
        $generated = false;

        if (empty($password)) {
            $password = Str::password(20);
            $generated = true;
        }

        $admin = User::firstOrNew(['email' => $email]);
        $admin->name = $admin->name ?? 'admin';
        $admin->password = Hash::make($password);
        // is_admin / email_verified_at are not mass-assignable, so set them explicitly.
        $admin->forceFill(['is_admin' => true, 'email_verified_at' => now()])->save();

        if ($generated && $this->command) {
            $this->command->warn("Admin account {$email} created with one-time password: {$password}");
            $this->command->warn('Store it in a password manager or set ADMIN_PASSWORD in .env.');
        }
    }
}
