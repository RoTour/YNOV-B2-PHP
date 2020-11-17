@extends('application')

@section('page-content')


    <div class="container">
        <h1>INDEX OF CONTACTS</h1>
{{--        <pre>--}}
{{--        {{ print_r($contacts) }}--}}
{{--        </pre>--}}
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
                    <td>
                        [
                        <a href="#">Show</a> |
                        <a href="{{ route("contacts.edit", $contact->id) }}">Edit</a> |
                        <a>Delete</a>
                        ]
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
