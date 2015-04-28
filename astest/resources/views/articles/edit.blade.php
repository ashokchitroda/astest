<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('articles') }}">View All Articles</a></li>
        <li><a href="{{ URL::to('articles/create') }}">Create a Article</a>
    </ul>
</nav>

<h1>Edit {{ $article->title }}</h1>

<!-- if there are creation errors, they will show here -->
{!! HTML::ul($errors->all()) !!}

{!! Form::model($article, array('route' => array('articles.update', $article->id), 'method' => 'PUT')) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description') !!}
        {!! Form::textarea('description', null, array('class' => 'form-control')) !!}
    </div>

    {!! Form::submit('Edit the Article!', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}

</div>
</body>
</html>

