@extends("student.form")
@section("title")Edit Student @endsection
@section("header") Edit Student @endsection
@section("action"){{ route("student.update", $editing_student) }} @endsection
@section("method") @method("PUT") @endsection
@section("firstname") {{ $editing_student->firstname }} @endsection
@section("lastname") {{ $editing_student->lastname }} @endsection
@section("email") {{ $editing_student->email }} @endsection
