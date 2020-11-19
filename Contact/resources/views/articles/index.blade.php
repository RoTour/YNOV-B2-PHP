@extends('application')

@section('page-title')
    Articles
@endsection

@section('page-content')
    @if($search)
        <p>Search result: {{ $search }}</p>
        <a href="{{route("articles.index")}}" class="mb-5">Return to list</a>
    @endif
    <ul>
        @foreach($articles as $article)
            @if($article->published)
                <li><a href="{{route("articles.show", $article)}}">{{$article->title}}</a></li>
                <li><a href="{{route("articles.details", $article->id)}}">Details</a></li>
{{--                <li>{{$article->description}}</li>--}}
            @endif
        @endforeach
    </ul>
@endsection

