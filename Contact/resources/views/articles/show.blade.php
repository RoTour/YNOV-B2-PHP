@extends('application')

@section('page-title')
    {{ $article->title }}
@endsection

@section('page-content')
    {{ $article->description}}
@endsection

