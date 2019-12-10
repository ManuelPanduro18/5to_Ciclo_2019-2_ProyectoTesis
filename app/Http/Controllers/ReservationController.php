<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Reservation;
use App\Documento;
use App\Destinatario;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use App\Mail\MailReceived;

class ReservationController extends Controller
{
    /*
    public function reservations(){
        return $this->hasMany(App\Reservation::class);
    }

    public function documento(){
        return $this->belongsTo(App\Documento::class);
    }

    public function Reservation(){
        $documentos=Documento::all();
        $reservations=Reservation::with('documentos')->get();
        return view('Reservation.index',compact('reservations','documentos')); 
    }

    public function __construct()
    {
       
    }
    /**
     * Create a new controller instance.
     *
     * @return void
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function trash(){
        $reservations=Reservation::onlyTrashed()->get();
        return view('Reservation.trash',compact('reservations'));
    }


    public function index()
    {
        //
        $user=\Auth::user();
        $reservations=Reservation::orderBy('id','DESC')->where('usuario_id',$user->id)->get();
        return view('Reservation.index',compact('reservations')); 
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $documentos=Documento::all();
        return view('Reservation.create', compact('documentos'));
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[ 'nombres'=>'required', 'apellidos'=>'required', 'documento'=>'required','num_documento'=>'required','num_placa', 'visitado'=>'required', 'telefono'=>'required','empresa']);

        $documento=$request->get('documento');
        $num_documento=$request->get('num_documento');
        $nombres=$request->get('nombres');
        $apellidos=$request->get('apellidos');
        $num_placa=$request->get('num_placa');
        $visitado=$request->get('visitado');
        $telefono=$request->get('telefono');
        $empresa=$request->get('empresa');

        for ($i=0; $i <count($documento) ; $i++) { 
            $reservation=new Reservation();
            $reservation->documento=$documento[$i];
            $reservation->num_documento=$num_documento[$i];
            $reservation->nombres=$nombres[$i];
            $reservation->apellidos=$apellidos[$i];
            $reservation->num_placa=$num_placa[$i];
            $reservation->visitado=$visitado[$i];
            $reservation->telefono=$telefono[$i];
            $reservation->empresa=$empresa[$i];
            $reservation->usuario_id=\Auth::user()->id;
            $reservation->save();
        }

        /*$input=Input::all();
        $condition=$input['nombres'];

        foreach ($condition as $key => $condition) {
            $reservation=new Reservation();
            $reservation->documento=$input['documento'][$key];
            $reservation->num_documento=$input['num_documento'][$key];
            $reservation->nombres=$input['nombres'][$key];
            $reservation->apellidos=$input['apellidos'][$key];
            $reservation->num_placa=$input['num_placa'][$key];
            $reservation->visitado=$input['visitado'][$key];
            $reservation->telefono=$input['telefono'][$key];
            $reservation->empresa=$input['empresa'][$key];
            $reservation->usuario_id=\Auth::user()->id;
            $reservation->save();
        }*/

        $destinatarios=Destinatario::pluck('email');
        Mail::to($destinatarios)->send(new MailReceived ($reservation));
        return redirect()->route('reservation.index')->with('success','Registro creado satisfactoriamente');
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservations=Reservation::find($id);
        return  view('reservation.show',compact('reservations'));
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $documentos=Documento::all();
        $reservation=reservation::find($id);
        return view('reservation.edit',compact('reservation'),compact('documentos'));
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)    {
        //
        $this->validate($request,[  'nombres'=>'required', 'apellidos'=>'required', 'documento'=>'required','num_documento', 'num_placa', 'visitado'=>'required', 'telefono'=>'required','empresa']);
 
        reservation::find($id)->update($request->all());
        return redirect()->route('reservation.index')->with('success','Registro actualizado satisfactoriamente');
 
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         Reservation::find($id)->delete();
        return redirect()->route('reservation.index')->with('success','Registro eliminado satisfactoriamente');
    }

    /**
     * Ejemplo de método REST 
     *
     * @return \Illuminate\Http\Response
     */

    public function getReservations(){
        $reservations=Reservation::all();
        return response()->json($reservations);
    }

    public function getDocumento($documento){
        return Reservation::where('num_documento',$documento)->first();
    }
}
