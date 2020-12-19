@extends("parts.index")

@section("title") Students @endsection
@section("header") Students at Fiction Ynov Campus: @endsection
@section("addButtonRoute") {{ route("student.create") }} @endsection
@section("addButtonText") Add Student @endsection
@section("tableHead")
	<tr>
		<th>Firstname</th>
		<th>Lastname</th>
		<th>Email</th>
		<th>Promotion</th>
		<th>Actions</th>
	</tr>
@endsection
@section("tableBody")
	@foreach($students as $student)
		<tr>
			<td>{{ $student->firstname }}</td>
			<td>{{ $student->lastname }}</td>
			<td>{{ $student->email }}</td>
			<td>@if(isset($student->promo)){{ $student->promo->infos() }} @else This student does not belong to any promotion yet. @endif</td>
			<td class="d-flex justify-content-around border-bottom-0">
				<a class="btn btn-outline-success mr-2" href="{{ route("student.show", $student) }}">Show</a>
				<a class="btn btn-outline-primary mr-2" href="{{ route("student.edit", $student) }}">Edit</a>
				<form action="{{ route("student.destroy", $student) }}" method="post">
					<input class="btn btn-outline-danger" type="submit" value="Delete"/>
					@method('delete')
					@csrf
				</form>
			</td>
		</tr>
	@endforeach
@endsection

