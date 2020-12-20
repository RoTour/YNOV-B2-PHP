@extends("module.form")
@section("title")Edit Module @endsection
@section("header") Edit Module @endsection
@section("action"){{ route("module.update", $editing_module) }} @endsection
@section("method") @method("PUT") @endsection
@section("name") {{ $editing_module->name }} @endsection
@section("description") {{ $editing_module->description }} @endsection
