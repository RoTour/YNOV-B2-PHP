@extends("contacts._form")
@section('method')@method("put")@endsection
@section('formDest')"{{ route('contacts.update', $contact[0]->id) }}"@endsection
@section('firstnameFieldValue'){{ $contact[0]->firstname }}@endsection
@section('lastnameFieldValue'){{ $contact[0]->lastname }}@endsection
@section('emailFieldValue'){{ $contact[0]->email }}@endsection
@section('phoneFieldValue'){{ $contact[0]->phone }}@endsection
@section('button-text') Confirm changes @endsection
