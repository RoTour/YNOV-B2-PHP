@extends('application')

@section('page-content')


    <div class="container">
        <h1>INDEX OF CONTACTS</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->firstname }}</td>
                    <td>{{ $contact->lastname }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td class="d-flex justify-content-around">

                        <a href="{{ route("contacts.show", $contact->id) }}" class="btn btn-outline-success">Show</a>
                        <a href="{{ route("contacts.edit", $contact->id) }}" class="btn btn-outline-info">Edit</a>
                        <form action="{{ route("contacts.destroy", $contact->id) }}" method="post">
                            <input class="btn btn-outline-danger" type="submit" value="Delete" />
                            @method('delete')
                            @csrf
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
