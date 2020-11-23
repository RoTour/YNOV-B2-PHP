@extends('application')

{{--@section('page-title')--}}
{{--    {{ $article->title }}--}}
{{--@endsection--}}

@section('page-content')
    <div class="row justify-content-md-center">
        <div class="col-8 mt-4">
            <div class="card text-center shadow mb-5 bg-white rounded">
                <div class="card-header font-italic">
                    <div class="d-flex justify-content-center">
                        <div class="d-flex flex-column text-left">
                            {{ $article->title }}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-text text-left">
                        {{ $article->description }}
                    </div>
                </div>
                @if($article->updated_at)
                <div class="card-footer text-muted">
                    <small>  Last time edit: {{ $article->updated_at->format('Y.m.d') }}  </small>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection

