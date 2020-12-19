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
					<label for="firstname" class="form-label">Firstname</label>
					<input type="text" class="form-control" id="firstname" name="firstname" value="@yield("firstname")" required>
				</div>
				<div class="mb-3 col-6">
					<label for="lastname" class="form-label">Lastname</label>
					<input type="text" class="form-control" id="lastname" name="lastname" value="@yield("lastname")" required>
				</div>
			</div>
			<div class="row">
				<div class="mb-3 col-6">
					<label for="email" class="form-label">Email</label>
					<input type="email" class="form-control" id="email" name="email" value="@yield("email")" required>
				</div>
			</div>

			@foreach($promo_list as $promo)
				<div class="form-check">
					<input class="form-check-input" type="radio" name="promo_id" value="{{ $promo->id }}" id="promo-{{ $promo->id }}"
								 @if(isset($editing_student) && $promo->id == $editing_student->promo->id) checked @endif required>
					<label class="form-check-label" for="promo-{{ $promo->id }}">{{ $promo->name." ".$promo->speciality }}</label>
				</div>
			@endforeach

			<button type="submit" class="btn btn-primary mt-3 mb-5">Submit</button>
		</form>
	</div>
@endsection
