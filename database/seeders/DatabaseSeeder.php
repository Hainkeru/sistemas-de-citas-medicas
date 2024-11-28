<?php

namespace Database\Seeders;

use App\Models\Config;
use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Horario;
use App\Models\Secretaria;
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

        $this->call([RoleSeeder::class]);

        User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => (12345678)
        ])->assignRole('admin');

        User::create([
            'name' => 'secretaria',
            'email' => 'secretaria@admin.com',
            'password' => (12345678)
        ])->assignRole('secretaria');

        Secretaria::create([
            'nombres' => 'secretaria',
            'apellidos' => '1',
            'cc' => '1111111111',
            'celular' => '23323232233',
            'fecha_nacimiento' => '11/11/2011',
            'direccion' => 'El 69 # 80',
            'user_id' => '2',
        ]);


        User::create([
            'name' => 'Doctor1',
            'email' => 'Doctor1@admin.com',
            'password' => (12345678)
        ])->assignRole('doctor');

        User::create([
            'name' => 'Doctor2',
            'email' => 'Doctor2@admin.com',
            'password' => (12345678)
        ])->assignRole('doctor');

        User::create([
            'name' => 'Doctor3',
            'email' => 'Doctor3@admin.com',
            'password' => (12345678)
        ])->assignRole('doctor');

        Doctor::create([
            'nombre' => 'Doctor',
            'apellidos' => '1',
            'telefono' => '333333333333333333',
            'licencia_medica' => '1010101010101',
            'especialidad' => 'Psicologo',
            'user_id' => '3'
        ]);

        Doctor::create([
            'nombre' => 'Doctor',
            'apellidos' => '2',
            'telefono' => '1313123123',
            'licencia_medica' => '14124124124312',
            'especialidad' => 'Psicologo',
            'user_id' => '4'
        ]);

        Doctor::create([
            'nombre' => 'Doctor',
            'apellidos' => '3',
            'telefono' => '1313123123',
            'licencia_medica' => '14124124124312',
            'especialidad' => 'Psicologo',
            'user_id' => '5'
        ]);

        Consultorio::create([
            'nombre' => 'Virtual',
            'ubicacion' => 'N/A',
            'capacidad' => '20',
            'telefono' => '1213129319312',
            'especialidad' => 'Psicologio',
            'estado' => 'Activo',
        ]);

        Consultorio::create([
            'nombre' => 'Presencial',
            'ubicacion' => 'N/A',
            'capacidad' => '20',
            'telefono' => '1213129319312',
            'especialidad' => 'Psicologia',
            'estado' => 'Activo',
        ]);

        User::create([
            'name' => 'Paciente1',
            'email' => 'Paciente1@admin.com',
            'password' => (12345678)
        ])->assignRole('paciente');

        User::create([
            'name' => 'Usuario1',
            'email' => 'Usuario1@admin.com',
            'password' => (12345678)
        ])->assignRole('usuario');



        Horario::create([
            'día' => 'LUNES',
            'hora_inicio' => '08:00:00',
            'hora_fin' => '14:00:00',
            'doctor_id' => '1',
            'consultorio_id' => '1',
        ]);

        Config::create([
            'nombre'=>'Clinica LM',
            'direccion'=>'Diagonal 78 # 21-69',
            'telefono'=>'3024480371',
            'correo'=>'joaquin@email.com',
            'logo'=>'logos/w1OOJsWua7nA4dAu1ePMDEjPbstEyvME2b7oxoX6.png',
        ]);



        $this->call([PacienteSeeder::class]);
    }
}
