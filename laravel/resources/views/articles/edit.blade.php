<h1>Edit {{ $article->title }}</h1>

{!! Form::model($article, array('route' => array('articles.update', $article->id), 'method' => 'PUT', 'id' => 'articleForm')) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, array('class' => 'form-control')) !!}
        <label class="error" for="title" generated="true">
        	{{ ($errors->has('title'))? $errors->get('title')[0] : '' }}
        </label>
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description') !!}
        {!! Form::textarea('description', null, array('class' => 'form-control')) !!}
        <label class="error" for="description" generated="true">
        	{{ ($errors->has('description'))? $errors->get('description')[0] : '' }}
        </label>
    </div>

    {!! Form::submit('Edit Article', array('class' => 'btn btn-primary action')) !!}
    <a class="btn btn-primary action" href="{{ URL::to('articles/listing') }}">Cancle</a>

{!! Form::close() !!}

