@extends('admin.template.base')
@section('contenido')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			
			<div class="panel-heading"> Lista Trabajos y dibujos</div>				

			@if(Session::has('message'))
			<p class="alert alert-success"> {!! Session::get('message') !!}</p>
			@endif

			<div class="btn-group" role="group" aria-label="...">
				<a class="btn btn-info pull-right" href="{{route('administrador.trabajos.create')}}" role="button">Añadir Trabajos o Bocetos</a>
			</div>

			<div class="panel-body">
				<table class="table table-striped">
					<tr>
						<th>#</th>
						<th>Nombres Tatuador</th>
						<th>imagen</th>
						<th>descripcion</th>
						<th>categoria</th>
						
					</tr>
					@foreach($trabajotatuador as $trabajo)
					<tr>
						<td>{!! $trabajo->id !!}</td>
						<td>{!! $trabajo->tatuador->nombres !!}</td>
						<td>{!! $trabajo->imagen !!}</td>
						<td>{!! $trabajo->descripcion !!}</td>
						<td>{!! $trabajo->categoria !!}</td>
						
						<td class="text-center">
						{!! Form::open(['route' => ['administrador.trabajos.destroy', 'id' => $trabajo->id], 'method' => 'delete']) !!}
							<a href="{{ route('administrador.trabajos.edit',$trabajo->id) }}" class="btn btn-sample btn-xs">Editar</a>
							<button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Se borrará toda la información referente a este trabajo \nSeguro que desea eliminar este registro?');">Eliminar</button>
							{!! Form::close() !!}
						</td>

					</tr>


					@endforeach
				</table>
				
				{!! str_replace('/?', '?', $trabajotatuador->render()) !!}
			</div>			
		</div>
	</div>
</div>
@endsection