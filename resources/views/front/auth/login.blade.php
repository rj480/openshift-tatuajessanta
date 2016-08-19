@extends('front.template.base')
@section('contenido')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-5">
			<h2 class="Section-title Section-title-naranja">Iniciar sesión </h2>
		</div>
	</div>
		@include('front.template.partials.error')
		@include('front.template.partials.success')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			{!! Form::open(['route'=>'post_login', 'method' => 'post', 'role'=> 'form']) !!}

			<div class="form-group">
			{!! Form::email('correo', null, ['class' => 'form-control input-lg', 'placeholder' => 'Ingresa Tu Correo Electronico']) !!}
			</div>

			<div class="form-group">
				{!! Form::password('password', ['class' => 'form-control input-lg', 'placeholder' => 'Ingresa Tu Password']) !!}
			</div>

			<div class="checkbox">
				<label>
					<input type="checkbox" name="rememberme"> Recordame
				</label>
			</div>

			<button class="btn btn-block btn-lg btn-primary" type="submit">Entrar</button>

			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection