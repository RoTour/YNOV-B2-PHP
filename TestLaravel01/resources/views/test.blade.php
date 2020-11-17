@extends('layouts.template')

@section('title')
    DINNER
@endsection

@section('content')
    <h1> - WHAT'S FOR DINNER??</h1>
    <h2>{{ " - $dinner" }}</h2>
    <h1> - MY FAVOURITE</h1>
    <p>{{ $note }}</p>
@endsection
