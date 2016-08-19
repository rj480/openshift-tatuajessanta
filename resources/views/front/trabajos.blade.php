@extends('front.template.base')
@section('contenido')

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 col-xs-11">
			<h2 class="letter">Trabajos Realizados Por Nuestros Artistas </h2>
		</div>
	</div>

	<div class="row">
		
		@foreach($trabajos as $trabajo)	
		@if($trabajo->categoria == "trabajo")		
		<div class="col-md-3 col-xs-12">
			<div class="thumbnail">
				<a href="{{ url('/imagenes/trabajos/'.$trabajo->imagen) }}"  data-lightbox="galeria" data-title="{!! $trabajo->tatuador->nombres !!}"  > <img src="{{ url('/imagenes/trabajos/'.$trabajo->imagen) }}" </a>
				<div class="caption">
					<h4>{!! $trabajo->descripcion !!}</h4>
				</div>
			</div>
		</div>
		@endif
		@endforeach
	</div>
	
	{!! str_replace('/?', '?', $trabajos->render()) !!}
</div>


@endsection