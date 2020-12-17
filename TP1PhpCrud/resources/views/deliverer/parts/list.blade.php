<a class="btn btn-outline-success mt-3" href="{{ route("deliverer.create") }}">Add Deliverer</a>

<table class="table table-bordered mt-3">
	<thead>
	<tr>
		<th scope="col">Name</th>
		<th scope="col">Vehicle</th>
		<th scope="col">Actions</th>
	</tr>
	</thead>
	<tbody>

	@foreach($deliverers as $deliverer)
		<tr>
			<td>{{ $deliverer->name }}</td>
			<td>{{ $deliverer->vehicle }}</td>

			<td class="d-flex" style="size: inherit">
				<a class="btn btn-outline-success mr-2" href="{{ route("deliverer.show", $deliverer) }}">Show</a>
				<a class="btn btn-outline-info mr-2" href="{{ route("deliverer.edit", $deliverer) }}">Edit</a>
				<form action="{{ route("deliverer.destroy", $deliverer->id) }}" method="post">
					<input class="btn btn-outline-danger" type="submit" value="Delete"/>
					@method('delete')
					@csrf
				</form>
			</td>
		</tr>
	@endforeach

	</tbody>
</table>
