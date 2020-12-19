@extends("welcome")

@section("title")
	{{ $promo->infos() }}
@endsection
@section("content")
	<div class="container d-flex justify-content-center">
		<div class="card" style="width: 36rem;">
			<div class="card-body">
				<h5 class="card-title">{{ $promo->infos() }}</h5>

				<h6 class="mt-3">Modules: </h6>
				<div class="row">
					@foreach($promo->modules as $promo_module)
						<a class="col-6" href="{{ route("student.show", $promo_module) }}">
							{{ $promo_module->name }}</a>
					@endforeach
				</div>

				<h6 class="mt-3">Students: </h6>
				<div class="row">
					@foreach($promo->students as $promo_student)
								<a class="col-6" href="{{ route("student.show", $promo_student) }}">
									{{ $promo_student->full_name() }}</a>
					@endforeach
				</div>
				<div class="d-flex mt-4">
					<a class="btn btn-outline-primary mr-2" href="{{ route("promo.edit", $promo) }}">Edit</a>
					<form action="{{ route("promo.destroy", $promo) }}" method="post">
						<input class="btn btn-outline-danger" type="submit" value="Delete"/>
						@method('delete')
						@csrf
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
