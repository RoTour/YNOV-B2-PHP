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
				<div class="mb-3 col-6">
					<label for="speciality" class="form-label">Speciality</label>
					<input type="text" class="form-control" id="speciality" name="speciality" value="@yield("speciality")" required>
				</div>
			</div>

			<p class="font-weight-bold mt-3 font" style="font-size: 2em">Students : </p>
			<div class="row col-12">
			@foreach($students_list as $student)
				<div class="form-check col-3">
					<input type="checkbox" class="form-check-input" name="students[]" value="{{ $student->id }}" id="student-{{ $student->id }}"
								 @if(isset($editing_promo) && $editing_promo->students->contains($student->id)) checked @endif>
					<label class="form-check-label" for="student-{{ $student->id }}">{{ $student->full_name() }}</label>
				</div>
			@endforeach
			</div>
			<button type="submit" class="btn btn-primary mt-3 mb-5">Submit</button>
		</form>
	</div>
@endsection
