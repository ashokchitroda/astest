<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('articles') }}">Article Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('articles') }}">View All Articles</a></li>
        <li><a href="{{ URL::to('articles/create') }}">Create a Article</a>
    </ul>
</nav>

<h1>Showing {{ $article->title }}</h1>

    <div class="jumbotron text-left">
        <h2>{{ $article->title }}</h2>
        <p>
            <strong>Description : </strong> {{ $article->description }}<br>
            <strong>Created Date :</strong> {{ $article->created_at }}
        </p>
    </div>

</div>
</body>
</html>