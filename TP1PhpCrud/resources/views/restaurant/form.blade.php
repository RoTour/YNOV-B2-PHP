@extends("application")
@section('page-title')
    @yield('page-title')
@endsection
@section('page-content')
    <div class="container mb-5 mt-3">
        <form method="post" action="@yield('action')">
            @yield('method')
            @csrf
            <div class="form-row">
                <div class="col">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="@yield("name")">
                </div>
                <div class="col">
                    <label for="type">Type</label>
                    <input type="text" class="form-control" name="type" id="type" value="@yield("type")">
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" id="address" value="@yield("address")">
                </div>
                <div class="col">
                    <label for="city">City</label>
                    <input type="text" class="form-control" name="city" id="city" value="@yield("city")">
                </div>
                <div class="form-group">
                    <label for="postcode">Postcode</label>
                    <input type="text" class="form-control" name="postcode" id="postcode" value="@yield("postcode")">
                </div>
            </div>


            <div class="form-group">
                <label for="website">Website</label>
                <input type="text" class="form-control" name="website" id="website" value="@yield("website")">
            </div>
            <div class="form-group">
                <label for="description">Description (200 characters max.)</label>
                <input type="text" class="form-control" name="description" id="description" value="@yield("description")">
            </div>

            <div class="form-group">
                <label for="state">State</label>
                <select class="form-control" name="state" id="state">
                    <option>Open</option>
                    <option>Close</option>
                    <option>Under Construction</option>
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
