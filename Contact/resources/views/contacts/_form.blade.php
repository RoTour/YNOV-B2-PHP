@extends('application')

@section('page-content')
    <div class="container mt-5">
        <form method="post" action=@yield('formDest')>
            @yield('method')
            @csrf
            <div class="form-group row">
                <label for="firstname" class="col-sm-2 col-form-label">Firstname</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="firstname" name="firstname"
                           value="@yield('firstnameFieldValue')" required="required">
                </div>
            </div>
            <div class="form-group row">
                <label for="lastname" class="col-sm-2 col-form-label">Lastname</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="lastname" name="lastname"
                           value="@yield('lastnameFieldValue')" required="required">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email"
                           value="@yield('emailFieldValue')" required="required">
                </div>
            </div>
            <div class="form-group row">
                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" id="phone" name="phone"
                           value="@yield('phoneFieldValue')" required="required">
                </div>
            </div>
            <div class="form-group row d-flex">
                <button type="submit" class="btn btn-primary mt-3 text-right">@yield('button-text')</button>
            </div>
        </form>
    </div>

@endsection
