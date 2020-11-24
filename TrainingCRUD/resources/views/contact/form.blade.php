@extends("application")
@section('page-title')
    @yield('page-title')
@endsection
@section('page-content')
    <div class="container">
        <form method="post" action="@yield('action')">
            @yield('method')
            @csrf
            <div class="form-group">
                <label for="firstname">Firstname</label>
                <input type="text" class="form-control" name="firstname" id="firstname" value="@yield("firstname-field")">
            </div>
            <div class="form-group">
                <label for="lastname">Lastname</label>
                <input type="text" class="form-control" name="lastname" id="lastname" value="@yield("lastname-field")">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email" value="@yield("email-field")">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" name="phone" id="phone" value="@yield("phone-field")">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
