@extends("welcome")

@section("title")
	{{ $student->firstname." ".$student->lastname }}
@endsection
@section("content")
	<div class="container d-flex justify-content-center">
		<div class="card" style="width: 36rem;">
			<div class="card-body">
				<h5 class="card-title">{{ $student->firstname." ".$student->lastname }}</h5>
				<h6 class="card-subtitle mb-2 text-muted">{{ $student->email }}</h6>
				{{ $student->promo->name." ".$student->promo->speciality }}
				<div class="d-flex mt-4">
					<a class="btn btn-outline-primary mr-2" href="{{ route("student.edit", $student) }}">Edit</a>
					<form action="{{ route("student.destroy", $student) }}" method="post">
						<input class="btn btn-outline-danger" type="submit" value="Delete"/>
						@method('delete')
						@csrf
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
