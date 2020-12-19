@extends("welcome")

@section("title")
	@yield("title")
@endsection
@section("content")
	<div class="container">

		<form method="POST" action="@yield("action")">
			@csrf
			@yield("method")

			<div class="row">
				<div class="mb-3 col-6">
					<label for="name" class="form-label">Name</label>
					<input type="text" class="form-control" id="name" name="name" value="@yield("name")" required>
				</div>
			</div>
			<div class="row">
				<div class="mb-3 col-12">
					<label for="description" class="form-label">Description</label>
					<input type="text" class="form-control" id="description" name="description" value="@yield("description")"
								 required>
				</div>
			</div>


			<p class="font-weight-bold mt-3 font" style="font-size: 2em">Students : </p>
			<div class="row col-12">
				@foreach($promos_list as $promo)
					<div class="form-check col-3">
						<input class="form-check-input" type="checkbox" name="promos[]" value="{{ $promo->id }}"
									 id="promo-{{ $promo->id }}"
									 @if(isset($editing_module) && isset($editing_module->promos) && $editing_module->promos->contains($promo->id)) checked
									 @endif>
						<label class="form-check-label"
									 for="promo-{{ $promo->id }}">{{ $promo->name." ".$promo->speciality }}</label>
					</div>
				@endforeach
			</div>

			<p class="font-weight-bold mt-3 font" style="font-size: 2em">Students : </p>
			<div class="row col-12">
				@foreach($students_list as $student)
					<div class="form-check col-3">
						<input type="checkbox" class="form-check-input" name="students[]" value="{{ $student->id }}"
									 id="student-{{ $student->id }}"
									 @if(isset($editing_module) && $editing_module->students->contains($student->id)) checked @endif>
						<label class="form-check-label" for="student-{{ $student->id }}">{{ $student->full_name() }}</label>
					</div>
				@endforeach
			</div>
			<button type="submit" class="btn btn-primary mt-3 mb-5">Submit</button>
		</form>
	</div>
@endsection
