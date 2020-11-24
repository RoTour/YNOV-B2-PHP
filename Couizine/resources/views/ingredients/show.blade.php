@extends('application')
@section('page-title')
@endsection
@section('page-content')
    <div class="container">
        {{ $ingredient->name }}
    </div>
@endsection

