@extends('front.template.base')
@section('contenido')

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 col-xs-11">
			<h2 class="letter">Bocetos Realizados Por Nuestros Artistas </h2>
		</div>
	</div>

	<div class="row">
	
		@foreach($bocetos as $boceto)	
		@if($boceto->categoria == "dibujo")		
		<div class="col-md-3 ">
		<div class="thumbnail">
		<a href="{{ url('/imagenes/trabajos/'.$boceto->imagen) }}"  data-lightbox="galeria" data-title="{!! $boceto->tatuador->nombres !!}" > <img src="{{ url('/imagenes/trabajos/'.$boceto->imagen) }}"</a>
		<div class="caption">
			<h4>{!! $boceto->descripcion !!}</h4>
		</div>
		</div>
		</div>
		@endif
		@endforeach
	</div>
	
	{!! str_replace('/?', '?', $bocetos->render()) !!}
</div>


	@endsection