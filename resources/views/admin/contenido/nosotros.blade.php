@extends('admin.template.base')
@section('contenido')
<div class="row">
	<div class="col-md-12">
		@include('front.template.partials.error')
		@include('front.template.partials.success')
	</div>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h2> Mision y Vision</h2>
		</div>
	</div>
	{!! Form::open(['route' => 'administrador.nosotros.store', 'method' => 'post', 'role' => 'form', 'data-toggle' => "validator", 'files' => true]) !!}
	<div class="col-md-6 col-md-offset-3">
		<div class="form-group">
			{!! Form::label('vision','Vision') !!}
			{!! Form::textarea('vision', null, ['class' => 'form-control', 'required' => true]) !!}
			
		</div>		
		<div class="form-group">
			{!! Form::label('mision','Mision') !!}
			{!! Form::textarea('mision', null, ['class' => 'form-control', 'required' => true]) !!}
			<div class="help-block with-errors"></div>
		</div>	

		<button class="btn btn-primary pull-right" type="submit"><i class="fa fa-save"></i> Guardar</button>
	</div>
	{!! Form::close() !!}


@endsection