<nav class="navbar navbar-expand-lg navbar-light bg-dark mb-3">
	<a class="navbar-brand text-white" href="{{ route("restaurant.index") }}">EatAdvisor</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link text-white" href="{{ route("restaurant.index") }}">Restaurants List</a>
			</li>
			<li class="nav-item active">
				<a class="nav-link text-white" href="{{ route("employee.index") }}">Employees List</a>
			</li>
			<li class="nav-item active">
				<a class="nav-link text-white" href="{{ route("deliverer.index") }}">Deliverers List</a>
			</li>
			<li class="nav-item active">
			</li>
		</ul>
		<form class="form-inline my-2 my-lg-0" method="get">
			<a class="nav-link text-white" href="{{ route("contact.index") }}">Contact me!</a>
			<input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>
	</div>
</nav>
