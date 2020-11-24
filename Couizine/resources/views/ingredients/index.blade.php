@extends('application')
@section('page-title')
@endsection
@section('page-content')
    <div class="container">
        <ul class="list-group">
            @foreach($ingredients as $it)
                <li class="list-group-item d-flex justify-content-between">
                    <p>{{ $it->name }}</p>
                    <div class="d-flex">
                        <a href="{{ route("ingredients.show", $it) }}" class="btn btn-outline-success">Show</a>
                        <a href="{{ route("ingredients.edit", $it) }}" class="btn btn-outline-info">Edit</a>
                        <form action="{{ route("ingredients.destroy", $it->id) }}" method="post">
                            <input class="btn btn-outline-danger" type="submit" value="Delete" />
                            @method('delete')
                            @csrf
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
