<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = Paciente::all();
        return view( 'admin.pacientes.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view( 'admin.pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'cc' => 'required|unique:pacientes',
            'fecha_nacimiento' => 'required',
            'genero' => 'required',
            'celular' => 'required',
            'direccion' => 'required',
            'email'=> 'required|max:250|unique:pacientes',
            'alergias' => 'required',
            'grupo_sanguineo' => 'required',
            'contacto_emergencia' => 'required',
            'observaciones' => 'required',
            
        ]);

        $paciente = new Paciente();
        $paciente->nombres = $request->nombres;
        $paciente->apellidos = $request->apellidos;
        $paciente->cc = $request->cc;
        $paciente->genero = $request->genero;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->celular = $request->celular;
        $paciente->direccion = $request->direccion;
        $paciente->email = $request->email;
        $paciente->alergias = $request->alergias;
        $paciente->grupo_sanguineo = $request->grupo_sanguineo;
        $paciente->contacto_emergencia = $request->contacto_emergencia;
        $paciente->observaciones = $request->observaciones;
        $paciente->save();

        return redirect() ->route ('admin.pacientes.index')
            ->with('mensaje','Se ha registrado al usuario correctamente.')
            ->with('icono','success');
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $paciente = Paciente::findorFail($id);
        return view('admin.pacientes.show',compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $paciente = Paciente::findorFail($id);
        return view('admin.pacientes.edit',compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $paciente = paciente::find($id);
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'cc' => 'required|unique:pacientes,cc,'.$paciente->id,
            'genero' => 'required',
            'fecha_nacimiento' => 'required',
            'celular' => 'required',
            'email'=> 'required|max:250|unique:pacientes,email,'.$paciente->id,
            'password'=> 'nullable|max:250|confirmed',
            'direccion' => 'required',
            'email' => 'required',
            'alergias' => 'required',
            'grupo_sanguineo' => 'required',
            'contacto_emergencia' => 'required',
            'observaciones' => 'required',
        ]);

        $paciente->nombres = $request->nombres;
        $paciente->apellidos = $request->apellidos;
        $paciente->cc = $request->cc;
        $paciente->genero = $request->genero;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->celular = $request->celular;
        $paciente->direccion = $request->direccion;
        $paciente->email = $request->email;
        $paciente->alergias = $request->alergias;
        $paciente->grupo_sanguineo = $request->grupo_sanguineo;
        $paciente->contacto_emergencia = $request->contacto_emergencia;
        $paciente->observaciones = $request->observaciones;
        $paciente->save();

        return redirect() ->route ('admin.pacientes.index')
            ->with('mensaje','Se ha actualizado al usuario correctamente.')
            ->with('icono','success');
    }

    public function confirmDelete($id) 
    {
        $paciente = Paciente::findorFail($id);
        return view('admin.pacientes.delete',compact('paciente'));
    }


    public function destroy($id)
    {
        Paciente::destroy($id);
        return redirect() ->route ('admin.pacientes.index')
            ->with('mensaje','Se ha eliminado al usuario correctamente.')
            ->with('icono','success');
    }
}
