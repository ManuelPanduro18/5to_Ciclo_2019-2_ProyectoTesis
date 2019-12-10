@extends('layouts.app')

@section('content')

  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Bienvenido a su papelera</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('reservation.index') }}" class="btn btn-info btn-block" >Atrás</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Nombres</th>
               <th>Apellidos</th>
               <th>Tipo de documento</th>
               <th>Número del documento</th>
               <th>Placa del auto</th>
               <th>Visita a:</th>
               <th>Teléfono del trabajador</th>
               <th>Fecha de creación</th>
               <th>Empresa</th>
               <th>Fecha de la eliminación</th>
             </thead>
             <tbody>
              @if($reservations->count())  
              @foreach($reservations as $reservation)  
              <tr>
                <td>{{$reservation->nombres}}</td>
                <td>{{$reservation->apellidos}}</td>
                <td>{{$reservation->documento}}</td>
                <td>{{$reservation->num_documento}}</td>
                <td>{{$reservation->num_placa}}</td>
                <td>{{$reservation->visitado}}</td>
                <td>{{$reservation->telefono}}</td>
                <td>{{$reservation->created_at}}</td>
                <td>{{$reservation->empresa}}</td>
                <td>{{$reservation->deleted_at}}</td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registros eliminados !!</td>
              </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
     </div>
  </div>
</section>
@endsection