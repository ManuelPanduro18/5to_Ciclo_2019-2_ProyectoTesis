@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
function mostrar(frm,num) { 
  if(num==1) { 
    frm.num_placa.style.visibility='visible';
  } 
  else { 
    frm.num_placa.style.visibility='hidden'; 
  } 
}; 

$(document).ready(function(){
	$('.add-more-btn').click(function() {
		html='<label>Tipo de Documento:</label><select name="documento[]" class="form-control input-sm"><option value="">--Seleccionar--</option><option>Documento de Identidad (DNI)</option><option>Carnet de Extranjería (CE)</option></select></br>';

		html+='<input type="text" name="num_documento[]" class="form-control input-sm" placeholder="Número de documento"><br/>';

		html+='<input type="text" name="nombres[]" class="form-control input-sm" placeholder="Nombres del visitante"><br/>';

		html+='<input type="text" name="apellidos[]" class="form-control input-sm" placeholder="Apellidos del visitante"><br/>';

		html+='<label>¿Cuenta con auto?</label><br><label>No: <input type="radio" name="rad" checked="checked" onclick="mostrar(this.form,0)" /></label><label>Si: <input type="radio" name="rad" onclick="mostrar(this.form,1)" /></label><input type="text" name="num_placa[]" class="form-control input-sm" placeholder="Placa del auto del visitante" style="visibility:hidden"><br/>';

		html+='<input type="text" name="visitado[]" class="form-control input-sm" placeholder="Trabajador a quien va a visitar"><br/>';

		html+='<input type="text" name="telefono[]" class="form-control input-sm" placeholder="Telefono del trabajador"><br/>';

		html+='<input type="text" name="empresa[]" id="empresa" class="form-control input-sm" placeholder="Empresa del visitante"><p style="font-size: 12px;"><i>opcional<i></p>';

		$(".form-block").append(html);





  		//var clone = $('.form-main').clone('.form-block');
  		//$('.form-main').append(clone);
	});
});
</script>
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
 			<a class="btn btn-primary add-more-btn">Agregar para más registros</a>
 			<br>
 			<br>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Nueva Reservacion</h3>
				</div>
				<div class="panel-body">
				<div class="pull-right">
			            <div class="btn-group">
			              <a href="{{ route('reservation.index') }}" class="btn btn-info btn-block" >Atrás</a>
			            </div>
          			</div>
          			<br>
          			<br>	
					<div class="table-container" id="contenedor">
						<form method="POST" action="{{ route('reservation.store') }}" id="form" class="form-main">
							{{ csrf_field() }}

							<div class="form-block">

								<div class="form-group">
										<label>Tipo de Documento:</label>
										<select name="documento[]" id="documento" class="form-control input-sm">
											<option value="">--Seleccionar--</option>
											<option>Documento de Identidad (DNI)</option>
											<option>Carnet de Extranjería (CE)</option>
										</select>
								</div>

								<div class="form-group">
										<input type="text" name="num_documento[]" id="num_documento" class="form-control input-sm" placeholder="Número de documento">
								</div>

								<div class="form-group">
										<input type="text" name="nombres[]" id="nombres" class="form-control input-sm" placeholder="Nombres del visitante">
								</div>

								<div class="form-group">
										<input type="text" name="apellidos[]" id="apellidos" class="form-control input-sm" placeholder="Apellidos del visitante">
								</div>

								<div class="form-group">
									<label>¿Cuenta con auto?</label>
									<br>
									<label>No: <input type="radio" name="rad" checked="checked" onclick="mostrar(this.form,0)" /></label>
									<label>Si: <input type="radio" name="rad" onclick="mostrar(this.form,1)" /></label> 
									<input type="text" name="num_placa[]" id="num_placa" class="form-control input-sm" placeholder="Placa del auto del visitante" style="visibility:hidden">
								</div>

								<div class="form-group">
										<input type="text" name="visitado[]" id="visitado" class="form-control input-sm" placeholder="Trabajador a quien va a visitar">
								</div>

								<div class="form-group">
										<input type="text" name="telefono[]" id="telefono" class="form-control input-sm" placeholder="Telefono del trabajador">
								</div>

								<div class="form-group">
										<input type="text" name="empresa[]" id="empresa" class="form-control input-sm" placeholder="Empresa del visitante">
										<p style="font-size: 12px;"><i>opcional<i></p>
								</div>
							</div>
									
							<input type="submit"  value="Guardar" class="btn btn-success btn-block" onclick="return confirm('¿Estás seguro que desea registrar ?')">
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
@stop

