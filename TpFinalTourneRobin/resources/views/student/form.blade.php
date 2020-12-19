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

			<p class="font-weight-bold mt-3 font" style="font-size: 2em">Promotions : </p>
			<div class="row col-12">
				@foreach($promos_list as $promo)
					<div class="form-check col-3">
						<input class="form-check-input" type="radio" name="promo_id" value="{{ $promo->id }}"
									 id="promo-{{ $promo->id }}"
									 @if(isset($editing_student) && isset($editing_student->promo) && $editing_student->promo->id == $promo->id) checked @endif>
						<label class="form-check-label"
									 for="promo-{{ $promo->id }}">{{ $promo->infos() }}</label>
					</div>
				@endforeach
			</div>

			<p class="font-weight-bold mt-3 font" style="font-size: 2em">Modules : </p>
			<div class="row col-12">
				@foreach($modules_list as $module)
					<div class="form-check col-3">
						<input type="checkbox" class="form-check-input" name="modules[]" value="{{ $module->id }}"
									 id="module-{{ $module->id }}"
									 @if(isset($editing_student) && $editing_student->modules->contains($module->id)) checked @endif>
						<label class="form-check-label" for="module-{{ $module->id }}">{{ $module->name }}</label>
					</div>
				@endforeach
			</div>

			<button type="submit" class="btn btn-primary mt-3 mb-5">Submit</button>
		</form>
	</div>
@endsection
