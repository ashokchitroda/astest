<h1>Showing {{ $article->title }}</h1>

<div class="jumbotron text-left">
	<h2>{{ $article->title }}</h2>
    <p>
    	<strong>Description : </strong> {{ $article->description }}<br>
    </p>
    <sup>
    	<strong>Created Date :</strong> {{ date("d-m-Y",strtotime($article->created_at)) }}<br/>
        <strong>Updated Date :</strong> {{ date("d-m-Y",strtotime($article->updated_at)) }}
    </sup>	
</div>
<a class="btn btn-small btn-info action" href="{{ URL::to('articles/listing') }}">Back to return</a>
