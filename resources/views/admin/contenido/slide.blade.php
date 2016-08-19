@extends('admin.template.base')
@section('contenido')
<div class="row">
	<div class="col-md-12">
		@include('front.template.partials.error')
		@include('front.template.partials.success')
	</div>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h2> Agregar Slide</h2>
		</div>
	</div>
	{!! Form::open(['route' => 'administrador.slide.store', 'method' => 'post', 'role' => 'form', 'data-toggle' => "validator", 'files' => true]) !!}
	<div class="col-md-6 col-md-offset-3">
		<div class="form-group">
			{!! Form::label('imagen', 'imagen') !!}
			{!! Form::file('imagen', ['required' => true]) !!}
			<div class="help-block with-errors"></div>
			<div class="help-block">Medidas 800px x 500px</div>
		</div>		
		<div class="form-group">
			{!! Form::label('titulo','Titulo De La Imagen') !!}
			{!! Form::text('titulo', null, ['class' => 'form-control', 'required' => true]) !!}
			<div class="help-block with-errors"></div>
		</div>

		<div class="form-group">
			{!! Form::label('descripcion', 'Descripcion') !!}
			{!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => '3']) !!}
			<div class="help-block with-errors"></div>
		</div>

		<button class="btn btn-primary pull-right" type="submit"><i class="fa fa-save"></i> Guardar</button>
	</div>
	{!! Form::close() !!}


<div class="row" style="margin-top: 16px;">
		@foreach ($slides as $slide)
			<div class="col-md-4">
				<div class="thumbnail">

					<img src="{{ url('/imagenes/slide/'.$slide->imagen) }}" alt="{{ $slide->imagen }}">
					<div class="caption">
						<h4>{{ $slide->titulo }}</h4>						
						<p>{!! Form::open(['route' => ['administrador.slide.destroy', 'id' => $slide->id], 'method' => 'delete','role' => 'form', 'data-toggle' => "validator", 'files' => true]) !!}
							<a href="#" class="btn btn-primary btn-xs">Editar</a><button type="submit" class="btn btn-xs btn-danger">Eliminar</button>
							{!! Form::close() !!}
						</p>
					</div>
				</div>
			</div>
		@endforeach
	</div>
@endsection