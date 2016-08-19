
@if(Session::has('message'))
<p class="alert alert-success"> 
	<i class="fa fa-check"></i>{!! Session::get('message') !!}</p>

	@endif