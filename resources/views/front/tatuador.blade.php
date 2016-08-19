@extends('front.template.base')
@section('contenido')

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-5 col-xs-11">
			<h2 class="letter">Conoce nuestro Tatuadores </h2>
		</div>
	</div>
	<div class="row">
		@foreach($tatuadores as $tatuador)
		<div class="col-md-4 col-xs-12">
			<div class="thumbnail">
				<img src="{{ url('/imagenes/'.$tatuador->imagen) }}"  alt="{{$tatuador->imagen}}">
				<div class="caption">
					<h3>{!! $tatuador->nombres !!}</h3>
					<h4> Telefono</h4>
					<p> {!! $tatuador->telefono !!}}</p>
					<h4>Redes Sociales</h4>
					<p>{{!! $tatuador->red_social!!}}</p>					
				</div> 
			</div>
		</div>
		@endforeach
	</div>
	{!! str_replace('/?', '?', $tatuadores->render()) !!}
</div>

@endsection 