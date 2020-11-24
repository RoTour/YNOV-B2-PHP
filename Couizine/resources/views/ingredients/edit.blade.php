@extends("ingredients.form")
@section('page-title')
    Edit Contact
@endsection
@section('action'){{ route('ingredients.update', $ingredient) }}@endsection
@section("method")@method("PUT")
@endsection
@section("name-field"){{ $ingredient->name }}
@endsection
