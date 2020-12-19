@extends("welcome")

@section("title")
	@yield("title")
@endsection
@section("content")
	<div class="container">

		<div class="row d-flex justify-content-between">
			<h2>@yield("header")</h2>
			<a class="btn btn-success btn-lg" href="@yield("addButtonRoute")">@yield("addButtonText")</a>
		</div>

		<table class="table table-bordered mt-3">
			<thead>
				@yield("tableHead")
			</thead>
			<tbody>
			@yield("tableBody")
			</tbody>
		</table>
	</div>
@endsection

{{--To quickly set the sections:--}}

{{--@extends("parts.index")--}}

{{--@section("title")  @endsection--}}
{{--@section("header")  @endsection--}}
{{--@section("addButtonRoute")  @endsection--}}
{{--@section("addButtonText")  @endsection--}}
{{--@section("tableHead")  @endsection--}}
{{--@section("tableBody")  @endsection--}}
