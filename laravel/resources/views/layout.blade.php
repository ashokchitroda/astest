<!DOCTYPE html>
<html>
<head>
    <title>Laravel CRUD test</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <style type="text/css">
    .error{ color: red;}
    </style>
    {!! HTML::script('js/jquery.js') !!}
    {!! HTML::script('js/validation.js') !!}
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('articles') }}">View All Articles</a></li>
        <li><a href="{{ URL::to('articles/create') }}" class="action">Create a Article</a>
    </ul>
</nav>

<div class="content">
@yield('content')
</div>

</div>
	{!! HTML::script('js/comman.js') !!}
</body>
</html>