@extends("employee.form")
@section("page-title")
  Create Employee
@endsection
@section("action"){{ route("employee.update", $employee) }}@endsection
@section("firstname"){{ $employee->name }}@endsection
