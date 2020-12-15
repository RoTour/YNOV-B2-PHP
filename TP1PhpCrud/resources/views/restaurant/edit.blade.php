@extends("restaurant.form")

@section('page-title')
    Edit Restaurant
@endsection

@section('action'){{ route('restaurant.update', $resto) }}@endsection

@section("method")@method("PUT")
@endsection



{{--Filling inputs--}}

@section("name"){{ $resto->name }}
@endsection

@section("address"){{ $resto->address->address }}
@endsection

@section("city"){{ $resto->address->city }}
@endsection

@section("postcode"){{ $resto->address->postal }}
@endsection

@section("website"){{ $resto->website }}
@endsection

@section("description"){{ $resto->description }}
@endsection

@section("type"){{ $resto->type }}
@endsection

@section("state"){{ $resto->state }}
@endsection
