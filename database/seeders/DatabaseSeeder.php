<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => (12345678)
        ]);

        User::create([
            'name' => 'secretaria',
            'email' => 'secretaria@admin.com',
            'password' => (12345678)
        ]);


        User::create([
            'name' => 'Doctor1',
            'email' => 'Doctor1@admin.com',
            'password' => (12345678)
        ]);

        User::create([
            'name' => 'Paciente1',
            'email' => 'Paciente1@admin.com',
            'password' => (12345678)
        ]);

        $this->call([PacienteSeeder::class]);
    }
}
