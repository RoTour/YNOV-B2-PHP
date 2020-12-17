@extends("application")
@section('page-title')
    List
@endsection
@section('page-content')
    <div class="container">

        <a class="btn btn-outline-success mt-3" href="{{ route("restaurant.create") }}">Add Restaurant</a>
        @if($search)
            <p class="mt-3">Search result for: {{ $search }}</p>
            <a href="{{route("restaurant.index")}}" class="mb-5">Return to list</a>
        @endif

        <table class="table table-bordered mt-3">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">City</th>
                <th scope="col">Postcode</th>
                <th scope="col">Website</th>
                <th scope="col">Type</th>
                <th scope="col">State</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>

            @foreach($restaurants as $resto)
                <tr>
                    <td>{{ $resto->name }}</td>
                    <td>{{ $resto->address->address }}</td>
                    <td>{{ $resto->address->city }}</td>
                    <td>{{ $resto->address->postal }}</td>
                    <td><a href="{{ $resto->website }}">Learn More</a></td>
                    <td>{{ $resto->type }}</td>
                    <td>{{ $resto->state }}</td>
                    <td class="d-flex" style="size: inherit">
                        <a class="btn btn-outline-success mr-2" href="{{ route("restaurant.show", $resto) }}">Show</a>
                        <a class="btn btn-outline-info mr-2" href="{{ route("restaurant.edit", $resto) }}">Edit</a>
                        <form action="{{ route("restaurant.destroy", $resto->id) }}" method="post">
                            <input class="btn btn-outline-danger" type="submit" value="Delete"/>
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
