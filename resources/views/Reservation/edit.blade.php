@extends('layouts.app')

@section('content')
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif
 
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Actualizar Reservación</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('reservation.update',$reservation->id) }}"  role="form">
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
							<div  style="width:50%; float:left;">

								<div class="form-group">
										<label>Tipo de Documento:</label>
										<select name="documento" id="documento" class="form-control input-sm">
											<option value="">--Seleccionar--</option>
											<option>Documento de Identidad (DNI)</option>
											<option>Carnet de Extranjería (CE)</option>
										</select>
								</div>

								<div class="form-group">
									<input type="text" name="num_documento" id="num_documento" class="form-control input-sm" value="{{$reservation->num_documento}}">
								</div>

								<div class="form-group">
									<input type="text" name="nombres" id="nombres" class="form-control input-sm" value="{{$reservation->nombres}}">
								</div>

								<div class="form-group">
									<input type="text" name="apellidos" id="apellidos" class="form-control input-sm" value="{{$reservation->apellidos}}">
								</div>
								
								<div class="form-group">
									<input type="text" name="num_placa" id="num_placa" class="form-control input-sm" value="{{$reservation->num_placa}}">
								</div>

								<div class="form-group">
									<input type="text" name="visitado" id="visitado" class="form-control input-sm" value="{{$reservation->visitado}}">
								</div>

								<div class="form-group">
									<input type="text" name="telefono" id="telefono" class="form-control input-sm" value="{{$reservation->telefono}}">
								</div>

								<div class="form-group">
									<label>Empresa del visitante</label>
									<input type="text" name="empresa" id="empresa" class="form-control input-sm" value="{{$reservation->empresa}}">
									<p style="font-size: 12px;"><i>opcional<i></p>
								</div>

							</div>

							<div style="width:40%; float:left; margin-top: 20px; margin-left: 60px;">

								<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
								<a href="{{ route('reservation.index') }}" class="btn btn-info btn-block" >Atrás</a>

							</div>
						</form>
					</div>
				</div>
 
			</div>
		</div>
	</section>
@endsection