@extends("contact.form")
@section('page-title')
    Edit Contact
@endsection
@section('action'){{ route('contact.update', $contact) }}@endsection
@section("method")@method("PUT")
@endsection
@section("firstname-field"){{ $contact->firstname }}
@endsection
@section("lastname-field"){{ $contact->lastname }}
@endsection
@section("email-field"){{ $contact->email }}
@endsection
@section("phone-field"){{ $contact->phone }}
@endsection
