@extends('application')

@section('page-title')
    {{ $resto->name }}
@endsection

@section('page-content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $resto->name }} - {{ $resto->type }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $resto->state }}</h6>
                <p class="card-text">{{ $resto->description }}</p>
                <p class="card-text">
                    <strong>Address:</strong>
                    {{ $resto->address->address }}, {{ $resto->address->city }}, {{ $resto->address->postal }}
                </p>
                <p class="card-text">
                    <strong>Learn More to this restaurant's official website:</strong>
                    {{ $resto->website }}
                </p>
                <p class="card-text">
                    <strong>Employees: </strong>
                </p>
                <ul class="list-group list-group-flush mb-3">
                    @foreach($resto->employees as $emp)
                        <li class="list-group-item">
                            <a href="{{ route("employee.show", $emp) }}">{{ "". $emp->firstname." ".$emp->lastname }}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="d-flex">
                    <a class="btn btn-outline-primary mr-2" href="{{ route("employee.create", ["restaurant"=>$resto]) }}">Add Employee</a>
                    <a class="btn btn-outline-primary mr-2" href="{{ route("deliverer.index", ["restaurant"=>$resto]) }}">Add Deliverers</a>
                    <a class="btn btn-outline-info mr-2" href="{{ route("restaurant.edit", $resto) }}">Edit</a>
                    <form action="{{ route("restaurant.destroy", $resto->id) }}" method="post">
                        <input class="btn btn-outline-danger" type="submit" value="Delete"/>
                        @method('delete')
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
