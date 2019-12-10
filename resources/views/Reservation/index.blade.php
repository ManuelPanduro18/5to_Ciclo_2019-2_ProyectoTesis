@extends('layouts.app')

@section('content')

  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista de reservaciones</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('reservation.trash') }}" class="btn btn-warning" >Papelera</a>
              <a href="{{ route('reservation.create') }}" class="btn btn-info" >Añadir Reservación</a>
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
               <!--<th>Editar</th>-->
               <th>Eliminar</th>
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
                <td>
                  <form action="{{action('ReservationController@destroy', $reservation->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
 
                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
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