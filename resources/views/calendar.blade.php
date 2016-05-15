@extends('app')

@section('content')
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Oops!</strong> Hay algún problema con tus datos.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>
				<div class="panel-body">
					<a href="reserve"><button class="btn btn-primary">Reservar Habitación</button></a>
					    
					    @foreach ($res as $r)
							<p>{{ $r->id }}</p>
							<p>{{ $r->name }}</p>
							<p>{{ $r->check_in }}</p>
							<p>{{ $r->check_out }}</p>
							<p>{{ $r->room }}</p>
						@endforeach
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
