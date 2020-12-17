@extends('application')
@section('page-title')@yield("title") @endsection
@section('page-content')
	@if(!isset($current_restaurant_id)) {{ $current_restaurant_id = null }}  @endif
	<div class="container">
		<form method="POST" action="@yield("action")">
			@csrf
			@yield("method")
			<div class="mb-3">
				<label for="name" class="form-label">Deliverer's name</label>
				<input type="text" class="form-control" id="name" name="name" value="@yield("name")">
			</div>
			<div class="mb-3">
				<label for="vehicle" class="form-label">Deliverer's vehicle</label>
				<input type="text" class="form-control" id="vehicle" name="vehicle" value="@yield("vehicle")">
			</div>
			@yield("restaurants-list")
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
@endsection
