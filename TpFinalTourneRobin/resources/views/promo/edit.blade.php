@extends("promo.form")
@section("title")Edit Promo @endsection
@section("action"){{ route("promo.update", $editing_promo) }} @endsection
@section("method") @method("PUT") @endsection
@section("name") {{ $editing_promo->name }} @endsection
@section("speciality") {{ $editing_promo->speciality }} @endsection
