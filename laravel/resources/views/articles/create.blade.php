<h1>Create a Article</h1>

{!! Form::open(array('url' => 'articles/', 'id' => 'articleForm')) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', Input::old('title'), array('class' => 'form-control')) !!}
		<label class="error" for="title" generated="true">
        	{{ ($errors->has('title'))? $errors->get('title')[0] : '' }}
        </label>
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description') !!}
        {!! Form::textarea('description', Input::old('description'), array('class' => 'form-control')) !!}
        <label class="error" for="description" generated="true">
        	{{ ($errors->has('description'))? $errors->get('description')[0] : '' }}
        </label>
    </div>

    {!! Form::submit('Create Article', array('class' => 'btn btn-primary action')) !!}
    <a class="btn btn-primary action" href="{{ URL::to('articles/listing') }}">Cancle</a>

{!! Form::close() !!}
 
	
