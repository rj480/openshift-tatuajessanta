@extends('front.template.base')
@section('contenido')

<div class="container">
	<div class="row">		
		<div class="col-md-offset-5">
			<h2 class="Section-title Section-title-naranja">Registrate</h2>
		</div>
		@include('front.template.partials.error')
		@include('front.template.partials.success')
		<div class="col-md-offset-3">
			<div class="row">
				<div class="col-md-4">
					<p>Campos Obligatoris<span class="text-danger">*</span></p>
				</div>
			</div>
			<div class="row">			
				{!! Form::open(['route' => 'post_registro', 'method' => 'post', 'role' => 'form', "data-toggle" => "validator", 'autocomplete' => 'off']) !!}
				<div class="col-md-4">
					<div class="form-group">
						{!! Form::label('nombres', 'nombres') !!}<span class="text-danger">*</span>
						{!! Form::text('nombres', null, ['class' => 'form-control', 'placeholder' => 'Nombre',  'required' => true]) !!}
						<div class="help-block with-errors">
							@if ($errors->has('nombres')) {{ $errors->first('nombres') }} @endif
						</div>
					</div>					
				</div>
				<div class="col-md-4">
					<div class="form-group">
						{!! Form::label('apellidos', 'apellidos') !!}<span class="text-danger">*</span>
						{!! Form::text('apellidos', null, ['class' => 'form-control', 'placeholder' => 'Apellidos',  'required' => true]) !!}
						<div class="help-block with-errors">
							@if ($errors->has('apellidos')) {{ $errors->first('apellidos') }} @endif
						</div>
					</div>
				</div>			
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">									
						{!! Form::label('fecha_nacimiento','Fecha De Nacimiento') !!}
						{!! Form::text('fecha_nacimiento', null, ['class' => 'form-control datepicker', 'placeholder' => 'Fecha de Nacimiento',  'required' => true]) !!}
						<div class="help-block with-errors">
							@if ($errors->has('fecha_nacimiento')) {{ $errors->first('fecha_nacimiento') }} @endif
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						{!! Form::label('correo', 'correo') !!}<span class="text-danger">*</span>
						{!! Form::email('correo', null, ['class' => 'form-control', 'placeholder' => 'Correo Electronico', 'required' => true]) !!}
						<div class="help-block with-errors">
							@if ($errors->has('correo')) {{ $errors->first('correo') }} @endif
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						{!! Form::label('genero','genero') !!}
						{!! Form::select('genero', $generos, null, ['class' => 'form-control', 'required' => true]) !!}
						<div class="help-block with-errors"></div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						{!! Form::label('password','contraseña') !!}<span class="text-danger">*</span>
						{!! Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' =>'Contraseña', 'required' => true]) !!}
						<div class="help-block with-errors"></div>
					</div>
				</div>				
			</div>	

			<div class="row">
				<div class="col-md-offset-2">
					<div class="col-md-5">
						<button type="submit" class="btn btn-block btn-lg btn-azul">Registrarme</button>

					</div>
				</div>
			</div>	
			{!!Form::close()!!}
		</div>
	</div>

</div>
@endsection