<h1>All the Articles</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th width="105px">Create Date</th>
            <th width="105px">Update Date</th>
            <th width="330px">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($articles as $key => $article)
        <tr>
            <td>{{ $article->id }}</td>
            <td>{{ $article->title }}</td>
            <td>{{ $article->description }}</td>
			<td>{{ date("d-m-Y",strtotime($article->created_at)) }}</td>
			<td>{{ date("d-m-Y",strtotime($article->updated_at)) }}</td>

			 <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the article (uses the destroy method DESTROY /articles/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
                {!! Form::open(array('url' => 'articles/' . $article->id, 'class' => 'pull-right')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit('Delete Article', array('class' => 'btn btn-warning action')) !!}
                {!! Form::close() !!}

                <!-- show the article (uses the show method found at GET /articles/{id} -->
                <a class="btn btn-small btn-success action" href="{{ URL::to('articles/' . $article->id) }}">Show Article</a>

                <!-- edit this article (uses the edit method found at GET /articles/{id}/edit -->
                <a class="btn btn-small btn-info action" href="{{ URL::to('articles/' . $article->id . '/edit') }}">Edit Article</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>