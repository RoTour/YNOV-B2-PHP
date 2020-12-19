@extends("parts.index")

@section("title") Promotions @endsection
@section("header") Promotions at Fiction Ynov Campus:  @endsection
@section("addButtonRoute") {{ route("promo.create") }} @endsection
@section("addButtonText") Add Promo @endsection
@section("tableHead")
	<tr>
		<th>Name</th>
		<th>Speciality</th>
		<th>Actions</th>
	</tr>
@endsection
@section("tableBody")
	@foreach($promos_list as $promo)
		<tr>
			<td>{{ $promo->name }}</td>
			<td>{{ $promo->speciality }}</td>
			<td class="d-flex justify-content-around border-bottom-0">
				<a class="btn btn-outline-success mr-2" href="{{ route("promo.show", $promo) }}">Show</a>
				<a class="btn btn-outline-primary mr-2" href="{{ route("promo.edit", $promo) }}">Edit</a>
				<form action="{{ route("promo.destroy", $promo) }}" method="post">
					<input class="btn btn-outline-danger" type="submit" value="Delete"/>
					@method('delete')
					@csrf
				</form>
			</td>
		</tr>
	@endforeach
@endsection
