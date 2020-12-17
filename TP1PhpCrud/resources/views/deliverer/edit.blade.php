@extends("deliverer.form")
@section("title")Edit Deliverer @endsection
@section("action"){{ route("deliverer.update", $editing_deliverer) }} @endsection
@section("method") @method("PUT") @endsection
@section("name"){{ $editing_deliverer->name }}@endsection
@section("vehicle"){{ $editing_deliverer->vehicle }} @endsection
@section("restaurants-list")
	@foreach($restaurants as $restaurant)
		<div class="mb-3 form-check">
			<input type="checkbox" class="form-check-input" id="restaurant-{{ $restaurant->id }}"
						 value="{{ $restaurant->id }}" name="restaurants[]"
						 	@foreach($editing_deliverer->restaurants as $deliverable_restaurant)
						 		@if($deliverable_restaurant->id == $restaurant->id) checked @endif
						 	@endforeach
			>
			<label class="form-check-label" for="restaurant-{{ $restaurant->id }}">{{ $restaurant->name }}</label>
		</div>
	@endforeach
@endsection
