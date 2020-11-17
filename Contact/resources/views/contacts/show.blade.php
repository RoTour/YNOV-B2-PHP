@extends('application')
@section('page-content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        {{ $contact->firstname . " " . strtoupper($contact->lastname) }}
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Email : </strong>{{ $contact->email }}</li>
                        <li class="list-group-item"><strong>Phone : </strong>{{ $contact->phone }}</li>
                        <li class="list-group-item d-flex flex-row">
                            <a class="btn btn-outline-info mr-3" href="{{ route("contacts.edit", $contact->id) }}">Edit</a>
                            <form action="{{ route("contacts.destroy", $contact->id) }}" method="post">
                                <input class="btn btn-outline-danger" type="submit" value="Delete" />
                                @method('delete')
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
