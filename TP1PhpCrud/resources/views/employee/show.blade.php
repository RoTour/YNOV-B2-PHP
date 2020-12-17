@extends('application')

@section('page-title')
  {{ $employee->firstname." ".$employee->lastname }}
@endsection

@section('page-content')
  <div class="container">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{ $employee->firstname." ".$employee->lastname }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">Working at {{ $employee->restaurant->name }}</h6>
        <p class="card-text">{{ $employee->restaurant->description }}</p>

        <p class="card-text">
          <strong>Mates: </strong>
        </p>
        <ul class="list-group list-group-flush mb-3">
          @foreach($employee->restaurant->employees as $emp)
            @if($emp->firstname != $employee->firstname && $emp->lastname != $employee->lastname)
              <li class="list-group-item">{{ "". $emp->firstname." ".$emp->lastname }}</li>
            @endif
          @endforeach
        </ul>
        <div class="d-flex">
          <a class="btn btn-outline-info mr-2" href="{{ route("employee.edit", $employee) }}">Edit</a>
          <form action="{{ route("employee.destroy", $employee->id) }}" method="post">
            <input class="btn btn-outline-danger" type="submit" value="Delete"/>
            @method('delete')
            @csrf
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
