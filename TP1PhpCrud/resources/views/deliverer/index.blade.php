@extends('application')
@section('page-title')Deliverers @endsection
@section('page-content')
  <div class="container">
    @if(isset($current_restaurant_id))
      @include("deliverer.parts.form_create")
    @else
      @include("deliverer.parts.list")
    @endif
  </div>
@endsection
