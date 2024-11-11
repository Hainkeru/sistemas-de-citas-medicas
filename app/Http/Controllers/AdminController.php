<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Paciente;
use App\Models\Secretaria;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $totalUsuarios = User::count();
        $totalSecretarias = Secretaria::count();
        $totalPacientes = Paciente::count();
        $totalConsultorios = Consultorio::count();
        $totalDoctores = Doctor::count();
        return view('admin.index', compact('totalUsuarios', 'totalSecretarias', 'totalPacientes', 'totalConsultorios', 'totalDoctores'));
    }
}
