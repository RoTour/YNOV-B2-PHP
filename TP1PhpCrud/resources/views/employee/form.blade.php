@extends("application")
@section('page-title')
  @yield('page-title')
@endsection
@section('page-content')
  <div class="container mb-5 mt-3">
    <form method="post" action="@yield('action')">
      @yield('method')
      @csrf
      <div class="form-row mb-5">
        <div class="col">
          <label for="firstname">Firstname</label>
          <input type="text" class="form-control" name="firstname" id="firstname" value="@yield("firstname")">
        </div>
        <div class="col">
          <label for="lastname">Lastname</label>
          <input type="text" class="form-control" name="lastname" id="lastname" value="@yield("lastname")">
        </div>
      </div>
      <fieldset disabled>
        <div class="form-row mb-5">
          <div class="col">
            <label for="restaurant">Restaurant</label>
            <input type="text" class="form-control" name="restaurant" id="restaurant" value="@yield("restaurant")">
          </div>
        </div>
      </fieldset>
      <input type="hidden" name="restaurant_id" value="@yield("restaurant_id")">
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection
