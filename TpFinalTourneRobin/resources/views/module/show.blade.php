@extends("welcome")

@section("title")
	{{ $module->name }}
@endsection
@section("content")
	<div class="container d-flex justify-content-center">
		<div class="card" style="width: 36rem;">
			<div class="card-body">
				<h5 class="card-title">{{ $module->name }}</h5>
				<p>{{ $module->description }}</p>
				<h6 class="mt-3">Students: </h6>
				<div class="row">
					@foreach($module->students as $module_student)
						<a class="col-6" href="{{ route("student.show", $module_student) }}">
							{{ $module_student->full_name() }}</a>
					@endforeach
				</div>
				<h6 class="mt-3">Promotions: </h6>
				<div class="row">
					@foreach($module->promos as $module_promo)
						<a class="col-6" href="{{ route("promo.show", $module_promo) }}">
							{{ $module_promo->infos() }}</a>
					@endforeach
				</div>
				<div class="d-flex mt-4">
					<a class="btn btn-outline-primary mr-2" href="{{ route("module.edit", $module) }}">Edit</a>
					<form action="{{ route("module.destroy", $module) }}" method="post">
						<input class="btn btn-outline-danger" type="submit" value="Delete"/>
						@method('delete')
						@csrf
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
