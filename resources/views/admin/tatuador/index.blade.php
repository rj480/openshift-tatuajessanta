@extends('admin.template.base')
@section('contenido')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			
			<div class="panel-heading"> Lista Tatuadores</div>				

			@if(Session::has('message'))
			<p class="alert alert-success"> {!! Session::get('message') !!}</p>
			@endif

			<div class="btn-group" role="group" aria-label="...">
				<a class="btn btn-info pull-right" href="{{route('administrador.tatuadores.create')}}" role="button">Crear Tatuador</a>
			</div>

			<div class="panel-body">
				<table class="table table-striped">
					<tr>
						<th>#</th>
						<th>Nombres</th>
						<th>Apellidos</th>
						<th>Telefono</th>
						<th>Descripcion</th>
						<th>Red Social</th>
						<th>imagen</th>
						<th>acciones</th>
					</tr>
					@foreach($tatuadores as $tatuador)
					<tr>
						<td>{!! $tatuador->id !!}</td>
						<td>{!! $tatuador->nombres!!}</td>
						<td>{!! $tatuador->apellidos!!}</td>
						<td>{!! $tatuador->telefono !!}</td>
						<td>{!! $tatuador->descripcion !!}</td>
						<td>{!! $tatuador->red_social !!}</td>
						<td>{!! $tatuador->imagen !!}</td>
						<td class="text-center">
						{!! Form::open(['route' => ['administrador.tatuadores.destroy', 'id' => $tatuador->id], 'method' => 'delete']) !!}
							<a href="{{ route('administrador.tatuadores.edit',$tatuador->id) }}" class="btn btn-sample btn-xs">Editar</a>
							<button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Se borrará toda la información referente a este Tatuador \nSeguro que desea eliminar este registro?');">Eliminar</button>
							{!! Form::close() !!}
						</td>

					</tr>
					@endforeach
				</table>
				{!! str_replace('/?', '?', $tatuadores->render()) !!}	
				
			</div>			
		</div>
	</div>
</div>
@endsection