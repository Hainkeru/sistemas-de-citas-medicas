<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Historial;
use App\Models\Paciente;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $historiales = Historial::with('paciente', 'doctor')->get();
        return view('admin.historial.index', compact('historiales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pacientes = Paciente::orderBy('apellidos', 'asc')->get();
        return view('admin.historial.create', compact('pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $historial = new Historial();

        $historial->details = $request->detalle;
        $historial->fecha_visita = $request->fecha_visita;
        $historial->paciente_id = $request->paciente_id;
        $historial->doctor_id = Auth::user()->doctores->id;
        
        $historial->save();

        return redirect() ->route ('admin.historial.index')
        ->with('mensaje','Se ha guardado el historial correctamente.')
        ->with('icono','success');
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $historial = Historial::find($id);
        return view('admin.historial.show', compact('historial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $historial = Historial::find($id);
        $pacientes = Paciente::orderBY('apellidos', 'asc')->get();
        return view('admin.historial.edit', compact('historial', 'pacientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $historial = Historial::find($id);

        $historial->details = $request->detalle;
        $historial->fecha_visita = $request->fecha_visita;
        $historial->paciente_id = $request->paciente_id;
        $historial->doctor_id = Auth::user()->doctores->id;
        
        $historial->save();

        return redirect() ->route ('admin.historial.index')
        ->with('mensaje','Se ha actualizado el historial correctamente.')
        ->with('icono','success');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function confirmDelete($id) {
        $historial = Historial::find($id);
        return view('admin.historial.delete', compact('historial'));
    }
    
    public function destroy($id)
    {
        $Historial = Historial::find($id);
        $Historial->delete();

        return redirect() ->route ('admin.historial.index')
        ->with('mensaje','Se ha eliminado el historial correctamente.')
        ->with('icono','success');
    }

    public function pdf ($id){

        $configuracion = Config::latest()->first();
        $historial = Historial::find($id);

        $pdf = Pdf::loadView('admin.historial.pdf', compact('historial', 'configuracion'));

        $pdf->output();
        $dompdf = $pdf->getDomPDF();
        $canvas = $dompdf->getCanvas();
        $canvas->page_text(20,800, "Impresora por: ".Auth::user()->email , null, 10, array(0,0,0));
        $canvas->page_text(270,800, "Pagina {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0,0,0));
        $canvas->page_text(450,800, "Fecha: " . \Carbon\Carbon::now()->format('d/m/Y')." - ". \Carbon\Carbon::now()->format('H:i:s'), null, 10, array(0,0,0));
        
        return $pdf->stream();
    }
    
    public function buscar_pacientes(Request$request){
        $cc = $request->cc;
        $paciente = Paciente::where('cc',$cc)->first();
        return view('admin.historial.buscar_pacientes', compact('cc', 'paciente'));
    }

    public function imprimir_historial($id){
        $configuracion = Config::latest()->first();

        $paciente = Paciente::find($id);

        $historiales = Historial::where('paciente_id',$id)->get();

        $pdf = Pdf::loadView('admin.historial.imprimir_historial', compact('historiales', 'configuracion', 'paciente'));

        
        $pdf->output();
        $dompdf = $pdf->getDomPDF();
        $canvas = $dompdf->getCanvas();
        $canvas->page_text(20,800, "Impresora por: ".Auth::user()->email , null, 10, array(0,0,0));
        $canvas->page_text(270,800, "Pagina {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0,0,0));
        $canvas->page_text(450,800, "Fecha: " . \Carbon\Carbon::now()->format('d/m/Y')." - ". \Carbon\Carbon::now()->format('H:i:s'), null, 10, array(0,0,0));
        
        return $pdf->stream();
    }
}
