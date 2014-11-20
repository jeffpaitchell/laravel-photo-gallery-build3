@section('content')

{{ Form::open(array('route' => 'store_photo', 'method' => 'POST', 'files' => true)) }}
        
    <div class="form-group">
        {{ Form::label('photo_name', 'Photo Name: ') }}
        {{ Form::text('photo_name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('photo_path', 'Photo File Path:') }}
        {{ Form::file('photo_path', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('stone_id', 'Stone: ') }}
        {{ Form::select('stone_id', $dropdown, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('photo_description', 'Photo Description: ') }}
        {{ Form::textarea('photo_description', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
    </div>

{{ Form::close() }}

@stop