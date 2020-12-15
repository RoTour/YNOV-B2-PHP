@extends('employee.form')
@section('page-title')
    Create Employee
@endsection
@section('action'){{ route('employee.store') }}@endsection
@section('restaurant'){{ $restaurant->name }}@endsection
@section('restaurant_id'){{ $restaurant->id }}@endsection
