<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultorios = Consultorio::all();
        $horarios = Horario::with('doctor', 'consultorio')->get();
        return view('admin.horarios.index', compact('horarios', 'consultorios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctores = Doctor::all();
        $consultorios = Consultorio::all();
        $horarios = Horario::with('doctor', 'consultorio')->get();
        return view('admin.horarios.create', compact('doctores', 'consultorios', 'horarios'));
    }

    public function cargar_datos_consultorios($id)
    {
        try {
            $horarios = Horario::with('doctor', 'consultorio')->where('consultorio_id', $id)->get();
            return view('admin.horarios.cargar_datos_consultorios', compact('horarios'));
        } catch (\Exception) {
            return response()->json(['mensaje' => 'Error']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'día' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required|after:hora_inicio',
            'consultorio_id' => 'required|exists:consultorios,id'
        ]);

        $horarioExistente = Horario::where('día', $request->día)
            ->where('consultorio_id', $request->consultorio_id)
            ->where(function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('hora_inicio', '>=', $request->hora_inicio)
                        ->where('hora_inicio', '<', $request->hora_fin);
                })
                    ->orWhere(function ($query) use ($request) {
                        $query->where('hora_fin', '>', $request->hora_inicio)
                            ->where('hora_fin', '<=', $request->hora_fin);
                    })
                    ->orWhere(function ($query) use ($request) {
                        $query->where('hora_inicio', '<', $request->hora_inicio)
                            ->where('hora_fin', '>', $request->hora_fin);
                    });
            })->exists();

        if ($horarioExistente) {
            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'ya existe un horario que se superpone con el horario ingresado')
                ->with('icono', 'error');
        }

        Horario::create($request->all());

        return redirect()->route('admin.horarios.index')
            ->with('mensaje', 'Se ha registrado el horario correctamente.')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $horario = Horario::findOrFail($id);
        return view('admin.horarios.show', compact('horario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $horario = Horario::with('doctor', 'consultorio')->findOrFail($id);
        $doctores = Doctor::all()->whereNotIn('id', $horario->doctor->id);
        $consultorios = Consultorio::all()->whereNotIn('id', $horario->consultorio->id);
        $horarios = Horario::with('doctor', 'consultorio')->get();
        return view('admin.horarios.edit', compact('horario', 'consultorios', 'horarios', 'doctores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $horario = horario::find($id);

        $request->validate([
            'día' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required|after:hora_inicio',
            'consultorio_id' => 'required|exists:consultorios,id'
        ]);

        $horarioExistente = Horario::where('día', $request->día)
            ->where('consultorio_id', $request->consultorio_id)
            ->where(function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('hora_inicio', '>=', $request->hora_inicio)
                        ->where('hora_inicio', '<', $request->hora_fin)
                        ->where('doctor_id', '!=', $request->doctor_id);
                })
                    ->orWhere(function ($query) use ($request) {
                        $query->where('hora_fin', '>', $request->hora_inicio)
                            ->where('hora_fin', '<=', $request->hora_fin)
                            ->where('doctor_id', '!=', $request->doctor_id);
                    })
                    ->orWhere(function ($query) use ($request) {
                        $query->where('hora_inicio', '<', $request->hora_inicio)
                            ->where('hora_fin', '>', $request->hora_fin)
                            ->where('doctor_id', '!=', $request->doctor_id);
                    });
            })->exists();

        if ($horarioExistente) {
            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'ya existe un horario que se superpone con el horario ingresado')
                ->with('icono', 'error');
        }

        $horario->update($request->all());

        return redirect()->route('admin.horarios.index')
            ->with('mensaje', 'Se ha actualizado el horario correctamente.')
            ->with('icono', 'success');
    }

    public function confirmDelete($id) {
        $horario = horario::with('doctor','consultorio')->findOrFail($id);
        return view('admin.horarios.delete',compact('horario'));
    }

    public function destroy($id)
    {
        $horario = Horario::find($id);
        $horario->delete();

        return redirect() ->route ('admin.horarios.index')
            ->with('mensaje','Se ha eliminado el horario correctamente.')
            ->with('icono','success');
    }
}
