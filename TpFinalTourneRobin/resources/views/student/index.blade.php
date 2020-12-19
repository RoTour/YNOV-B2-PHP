@extends("welcome")

@section("title")
	Students
@endsection
@section("content")
	<div class="container">

		<div class="row d-flex justify-content-between">
			<h2>Students at Fiction Ynov Campus: </h2>
			<a class="btn btn-success btn-lg" href="{{ route("student.create") }}">Add Student</a>
		</div>

		<table class="table table-bordered mt-3">
			<thead>
			<tr>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Email</th>
				<th>Promotion</th>
				<th>Actions</th>
			</tr>
			</thead>
			<tbody>
			@foreach($students as $student)
				<tr>
					<td>{{ $student->firstname }}</td>
					<td>{{ $student->lastname }}</td>
					<td>{{ $student->email }}</td>
					<td>{{ $student->promo->name." ".$student->promo->speciality }}</td>
					<td class="d-flex justify-content-around">
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
			</tbody>
		</table>
	</div>
@endsection
