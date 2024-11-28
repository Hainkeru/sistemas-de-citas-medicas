<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Doctor;
use App\Models\Event;
use App\Models\Horario;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        $request->validate([
            'fecha_reserva'=> 'required',
            'hora_reserva'=>'required|date_format:H:i',
        ]);

        $doctor = Doctor::find($request->doctor_id);
        $fecha_reserva = $request->fecha_reserva;
        $hora_reserva = $request->hora_reserva.':00';

        $dia = date('l',strtotime($fecha_reserva));
        $dia_de_reserva = $this->traducir_dia($dia);

        error_log($doctor);

        $horarios = Horario::where('doctor_id',$doctor->id)
                    ->where('día',$dia_de_reserva)
                    ->where('hora_inicio','<=',$hora_reserva)
                    ->where('hora_fin','>=',$hora_reserva)
                    ->exists();

        if(!$horarios) {
            return redirect()->back()->with([
                'mensaje' => 'El doctor no esta disponible en ese horario.',
                'icono' => 'error',
                'hora_reserva'=> 'El doctor no esta disponible en ese horario.',
            ]);
        }

        $fecha_hora_reserva = $fecha_reserva." ".$hora_reserva;

        // valida si existen eventos duplicado
        $eventos_duplicados = Event::where('doctor_id',$doctor->id)
                              ->where('start', $fecha_hora_reserva)
                              ->exists();

        if($eventos_duplicados){
            return redirect()->back()->with([
                'mensaje' => 'Ya existe una reserva con el mismo doctor en esa fecha y hora.',
                'icono' => 'error',
                'hora_reserva'=> 'Ya existe una reserva con el mismo doctor en esa fecha y hora.',
            ]);
        }

        $event = new Event();
        $event->title = $request->hora_reserva." ".$doctor->especialidad;
        $event->start = $request->fecha_reserva." ".$hora_reserva;
        $event->end = $request->fecha_reserva." ".$hora_reserva;
        $event->color = '#e82216';
        $event->user_id =Auth::user()->id;
        $event->doctor_id = $request->doctor_id;
        $event-> consultorio_id = '1';

        $event->save();

        return redirect() ->route ('admin.index')
            ->with('mensaje','Se ha registrado la reserva de la cita correctamente.')
            ->with('icono','success');


    }

    private function traducir_dia($dia){
        $dias=[
            'Monday' => 'LUNES',
            'Tuesday' => 'MARTES',
            'Wednesday' => 'MIERCOLES',
            'Thursday' => 'JUEVES',
            'Friday' => 'VIERNES',
            'Saturday' => 'SABADO',
            'Sunday' => 'DOMINGO',
        ];
        return $dias[$dia]??$dias;
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Event::destroy($id);
        return redirect() -> back()
            ->with('mensaje','Se ha eliminado la reserva de la cita correctamente.')
            ->with('icono','success');
    }

    public function reportes(){
        return view ('admin.reservas.reportes');
    }

    public function pdf(){
        $configuracion = Config::latest()->first();
        $eventos = Event::all();
        $pdf = Pdf::loadView('admin.reservas.pdf', compact('configuracion', 'eventos'));

        $pdf->output();
        $dompdf = $pdf->getDomPDF();
        $canvas = $dompdf->getCanvas();
        $canvas->page_text(20,800, "Impresora por: ".Auth::user()->email , null, 10, array(0,0,0));
        $canvas->page_text(270,800, "Pagina {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0,0,0));
        $canvas->page_text(450,800, "Fecha: " . \Carbon\Carbon::now()->format('d/m/Y')." - ". \Carbon\Carbon::now()->format('H:i:s'), null, 10, array(0,0,0));

        return $pdf->stream();
    }
    
    public function pdf_fechas (Request $request){

        $configuracion = Config::latest()->first();
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');

        $eventos = Event::whereBetween('start',[$fecha_inicio, $fecha_fin])->get();

        $pdf = Pdf::loadView('admin.reservas.pdf_fechas', compact('configuracion', 'eventos', 'fecha_inicio', 'fecha_fin'));

        $pdf->output();
        $dompdf = $pdf->getDomPDF();
        $canvas = $dompdf->getCanvas();
        $canvas->page_text(20,800, "Impresora por: ".Auth::user()->email , null, 10, array(0,0,0));
        $canvas->page_text(270,800, "Pagina {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0,0,0));
        $canvas->page_text(450,800, "Fecha: " . \Carbon\Carbon::now()->format('d/m/Y')." - ". \Carbon\Carbon::now()->format('H:i:s'), null, 10, array(0,0,0));

        return $pdf->stream();
    }
}
