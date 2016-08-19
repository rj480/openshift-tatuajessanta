@extends('admin.template.base')
@section('contenido')
<div class="container">
	<div class="row">		
		<div class="col-md-offset-4">
			<h2 class="Section-title Section-title-naranja">Crear nuevo Tatuador</h2>
		</div>

		<div class="col-md-offset-1">
			<div class="row">
				<div class="col-md-4">
					<p>Campos Obligatoris<span class="text-danger">*</span></p>
				</div>
			</div>
			<div class="row">			
				{!! Form::model($tatuadores, ['route' =>[ 'administrador.tatuadores.update', 'id' => $tatuadores->id], 'method' => 'patch', 'role' => 'form', "data-toggle" => "validator",'files'=> true, 'autocomplete' => 'off']) !!}
				<div class="col-md-4">
					<div class="form-group">
						{!! Form::label('nombres', 'nombres') !!}<span class="text-danger">*</span>
						{!! Form::text('nombres', null, ['class' => 'form-control', 'placeholder' => 'Nombre Del Tatuador',  'required' => true]) !!}
						
					</div>					
				</div>
				<div class="col-md-4">
					<div class="form-group">
						{!! Form::label('apellidos', 'apellidos') !!}<span class="text-danger">*</span>
						{!! Form::text('apellidos', null, ['class' => 'form-control', 'placeholder' => 'Apellidos Del Tatuador',  'required' => true]) !!}
						<div class="help-block with-errors">
							@if ($errors->has('apellidos')) {{ $errors->first('apellidos') }} @endif
						</div>
					</div>
				</div>			
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">									
						{!! Form::label('telefono','telefono') !!}
						{!! Form::text('telefono', null, ['class' => 'form-control datepicker', 'placeholder' => 'Telefono',  'required' => true]) !!}
						
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">									
						{!! Form::label('imagen','foto tatuador ') !!}
						{!!Form::file('file') !!}					
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					<div class="form-group">									
						{!! Form::label('red_social','Red social') !!}
						{!! Form::textarea('red_social', null, ['class' => 'form-control', 'placeholder' => 'Red social',  'required' => true,'class' => 'ckeditor']) !!}						
					</div>
				</div>
				<div class="col-md-5">
					<div class="form-group">									
						{!! Form::label('descripcion','descripcion') !!}
						{!! Form::textarea('descripcion', null, ['class' => 'form-control', 'placeholder' => 'descripcion',  'required' => true,'class' => 'ckeditor']) !!}						
					</div>
				</div>				
			</div>	

			<div class="row">
				<div class="col-md-offset-2">
					<div class="col-md-5">
						<button type="submit" class="btn btn-block btn-lg btn-azul">Actualizar</button>

					</div>
				</div>
			</div>	
				{!!Form::close()!!}
		</div>
	</div>

</div>
@endsection