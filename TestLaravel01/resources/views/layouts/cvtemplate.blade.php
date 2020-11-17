<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
</head>
<body>
<h1>
    <marquee>WELCOME TO MY CV YEY</marquee>
</h1>
<ul style="display: flex; justify-content: space-around">
    <li><a href="{{ route('page', ['cv']) }}">CV - Home page</a></li>
    <li><a href="{{ route('page', ['contact']) }}">Contact me</a></li>
    <li><a href="{{ route('page',['projects']) }}">My projects</a></li>
</ul>
@yield('content')
</body>
</html>
