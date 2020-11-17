@extends("contacts._form")
@section('method')@method("put")@endsection
@section('formDest')"{{ route('contacts.update', $contact->id) }}"@endsection
@section('firstnameFieldValue'){{ $contact->firstname }}@endsection
@section('lastnameFieldValue'){{ $contact->lastname }}@endsection
@section('emailFieldValue'){{ $contact->email }}@endsection
@section('phoneFieldValue'){{ $contact->phone }}@endsection
@section('button-text') Confirm changes @endsection
