<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Administración Pasos de Esperanza',
            'email' => env('ADMIN_EMAIL', 'admin@pasosdeesperanza.org'),
            'password' => env('ADMIN_PASSWORD', 'cambia-esta-clave'),
            'role' => 'admin',
        ]);
    }
}
