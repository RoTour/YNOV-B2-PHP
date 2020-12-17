<form method="POST"
      action="{{route("restaurant.store_deliverers", ["restaurant_id" => $current_restaurant_id])}}">
    @csrf
    @foreach($deliverers as $deliverer)
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="deliverer-{{ $deliverer->id }}"
                   value="{{ $deliverer->id }}" name="deliverers[]"
                    @foreach($deliverer->restaurants as $deliverable_restaurant)
                        @if($deliverable_restaurant->id == $current_restaurant_id) checked @endif
                    @endforeach>
            <label class="form-check-label"
                   for="deliverer-{{ $deliverer->id }}">{{ $deliverer->name }}</label>
        </div>
    @endforeach
    <button type="submit" class="btn btn-primary">Submit</button>
    <a type="submit" href="{{ route("deliverer.create", ["restaurant_id"=> $current_restaurant_id]) }}"
       class="btn btn-primary">Create</a>
</form>
