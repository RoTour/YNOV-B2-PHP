@extends("parts.index")

@section("title") Modules @endsection
@section("header")
	@if($search)
		Modules - Result for: {{ $search }}
	@else
		Modules at Fiction Ynov Campus:
	@endif
@endsection
@section("addButtonRoute") {{ route("module.create") }} @endsection
@section("addButtonText") Add Module @endsection
@section("tableHead")
	<tr>
		<th>Name</th>
		<th>Description</th>
		<th>Actions</th>
	</tr>
@endsection
@section("tableBody")
	@foreach($modules as $module)
		<tr>
			<td>{{ $module->name }}</td>
			<td>{{ $module->description }}</td>
			<td class="d-flex justify-content-around border-bottom-0">
				<a class="btn btn-outline-success mr-2" href="{{ route("module.show", $module) }}">Show</a>
				<a class="btn btn-outline-primary mr-2" href="{{ route("module.edit", $module) }}">Edit</a>
				<form action="{{ route("module.destroy", $module) }}" method="post">
					<input class="btn btn-outline-danger" type="submit" value="Delete"/>
					@method('delete')
					@csrf
				</form>
			</td>
		</tr>
	@endforeach
@endsection
