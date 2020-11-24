@extends("application")
@section('page-title')
    Contacts
@endsection
@section('page-content')

    <div class="container">
        <h1>Contact List</h1>
        <table>
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
                        <a href="{{ route("contact.edit", $contact) }}">Edit</a>
                        <form action="{{ route("contact.destroy", $contact->id) }}" method="post">
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
