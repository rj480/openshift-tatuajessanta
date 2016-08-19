@extends('admin.template.base')
@section('contenido')
<div class="container">
	<div class="row">		
		<div class="col-md-offset-4">
			<h2 class="Section-title Section-title-naranja">Añadir Trabajo o Boceto </h2>
		</div>

		<div class="col-md-offset-1">
			<div class="row">
				<div class="col-md-4">
					<p>Campos Obligatoris<span class="text-danger">*</span></p>
				</div>
			</div>
			<div class="row">			
				{!! Form::model($trabajos, ['route' => ['administrador.trabajos.update', $trabajos->id], 'method' => 'patch', 'role' => 'form', "data-toggle" => "validator",'files'=> true, 'autocomplete' => 'off']) !!}
				<div class="col-md-4">
					<div class="form-group">
						{!! Form::label('descripcion', 'descripcion') !!}<span class="text-danger">*</span>
						{!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'descripcion del trabajo',  'required' => true]) !!}
						
					</div>					
				</div>
				<div class="col-md-4">
					<div class="form-group">
						{!! Form::label('categoria','categoria') !!}
						{!! Form::select('categoria', $categoria, null, ['class' => 'form-control', 'required' => true]) !!}
						<div class="help-block with-errors"></div>
					</div>
				</div>			
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">									
						{!! Form::label('id_tatuador','Elige un tatuador') !!}
						{!! Form::select('id_tatuador', $tatuador, null, ['class' => 'form-control', 'required' => true]) !!}
						
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">									
						{!! Form::label('imagen','foto trabajos ') !!}
						{!!Form::file('file') !!}					
					</div>
				</div>
			

			<div class="row">
				<div class="col-md-offset-2">
					<div class="col-md-5">
						<button type="submit" class="btn btn-block btn-lg btn-azul">Guardar</button>

					</div>
				</div>
			</div>	
				{!!Form::close()!!}
		</div>
	</div>

</div>
@endsection 