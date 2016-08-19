@extends('front.template.base')

@section('header')
<div class="contenedor">
	<div class="row">
		<div class="col-md-12">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->				
				<div class="carousel-inner" >
					@if(count($slides)>0)
					@foreach ($slides as $i => $slide)
					
					<img class="imagen-slide" src="{{ url('/imagenes/slide/'.$slide->imagen) }}" >
					
					<div class="carousel-caption">
						<h3>{{ $slide->titulo }}</h3>
						<p>{{ $slide->descripcion }}</p>
					</div>
					
					@endforeach
					@endif
				</div>
				<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
</div>

@endsection

@section('contenido')
	<div class="row">
	<section class="seccion-contenido">
			<div class="col-md-4">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
			</div>		
	</section>
@endsection