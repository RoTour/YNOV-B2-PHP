@extends("deliverer.form")
@section("title")Create Deliverer @endsection
@section("action"){{ route("deliverer.store", ["restaurant_id" => $current_restaurant_id]) }} @endsection
@section("restaurants-list")
	@foreach($restaurants as $restaurant)
		<div class="mb-3 form-check">
			<input type="checkbox" class="form-check-input" id="restaurant-{{ $restaurant->id }}"
						 value="{{ $restaurant->id }}" name="restaurants[]"
						 	@if($current_restaurant_id != null && $restaurant->id == $current_restaurant_id) checked @endif>
			<label class="form-check-label" for="restaurant-{{ $restaurant->id }}">{{ $restaurant->name }}</label>
		</div>
	@endforeach
@endsection

