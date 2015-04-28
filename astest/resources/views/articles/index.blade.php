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

<h1>All the Articles</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>Description</td>
            <td>Created Date</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
    @foreach($articles as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->title }}</td>
            <td>{{ $value->description }}</td>
			<td>{{ $value->created_at }}</td>

			 <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the article (uses the destroy method DESTROY /articles/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
                {!! Form::open(array('url' => 'articles/' . $value->id, 'class' => 'pull-right')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit('Delete this Article', array('class' => 'btn btn-warning')) !!}
                {!! Form::close() !!}

                <!-- show the article (uses the show method found at GET /articles/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('articles/' . $value->id) }}">Show this Article</a>

                <!-- edit this article (uses the edit method found at GET /articles/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('articles/' . $value->id . '/edit') }}">Edit this Article</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>