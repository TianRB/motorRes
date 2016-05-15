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
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/reserve') }}" {{--enctype="multipart/form-data"--}}>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Check-In</label>
							<div class="col-md-6">
							<input type="text" class="form-control" id="datepicker" name="check_in">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Check-Out</label>
							<div class="col-md-6">
							<input type="text" class="form-control" id="datepicker2" name="check_out">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Nombre</label>
							<div class="col-md-6">
								<textarea class="form-control" name="name"></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Habitación</label>
							<div class="col-md-6">
								<textarea class="form-control" name="room"></textarea>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Reservar
								</button>
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>

@endsection
