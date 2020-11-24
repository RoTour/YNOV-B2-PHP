@extends('application')

@section('page-content')
<div class="container">
    <form method="post" action="@yield('action')">
        @yield('method')
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="@yield("name-field")">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
