<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $configuraciones = Config::all();
        return view('admin.configuraciones.index', compact('configuraciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.configuraciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        
        
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'logo' => 'required',
        ]);

        $config = new Config();

        $config->nombre = $request->nombre;
        $config->direccion = $request->direccion;
        $config->telefono = $request->telefono;
        $config->correo = $request->email;
        $config->logo = $request->file('logo')->store('logos', 'public');

        $config->save();

        return redirect() ->route ('admin.configuraciones.index')
            ->with('mensaje','Se ha guardado la configuracion correctamente.')
            ->with('icono','success');
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $configuracion = config::find($id);

        return  view('admin.configuraciones.show', compact('configuracion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $configuracion = config::find($id);

        return  view('admin.configuraciones.edit', compact('configuracion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required',
        ]);

        $config = config::find($id);

        $config->nombre = $request->nombre;
        $config->direccion = $request->direccion;
        $config->telefono = $request->telefono;
        $config->correo = $request->email;

        if ($request->hasFile('logo')) {
            Storage::delete('public/'.$config->logo);
            $config->logo = $request->file('logo')->store('logos', 'public');
        }
        

        $config->save();

        return redirect() ->route ('admin.configuraciones.index')
            ->with('mensaje','Se ha guardado la configuracion correctamente.')
            ->with('icono','success');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function confirmDelete($id) {
        $configuracion = Config::find($id);
        return view('admin.configuraciones.delete', compact('configuracion'));
    }
    
    public function destroy($id)
    {
        $configuracion = Config::find($id);
        Storage::delete('public/'.$configuracion->logo);
        Config::destroy($id);

        return redirect() ->route ('admin.configuraciones.index')
            ->with('mensaje','Se ha eliminado la configuracion correctamente.')
            ->with('icono','success');
    }
}
