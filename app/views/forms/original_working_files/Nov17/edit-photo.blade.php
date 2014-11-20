@section('content')

{{ Form::model($stone_photo, array('method' => 'PUT', 'route' => array('update_photo', $stone_photo->stone_id, $stone_photo->photo_id))) }}

    <div class="form-group">
        {{ Form::label('photo_name', 'Photo Name' . ':') }}
        {{ Form::text('photo_name', null, array('class' => 'form-control')) }}
    </div>
    

    <div class="form-group">
        {{ Form::label('stone_id', 'Stone' . ':') }}
        {{ Form::select('stone_id', $dropdown, $stone_photo->stone_id) }}
    </div>

    <div class="form-group">
        {{ Form::label('photo_description', 'Photo Description' . ':') }}
        {{ Form::textarea('photo_description', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::submit('Update' , array('class' => 'btn btn-primary')) }}
        {{ link_to_route('show_photo', 'Cancel', array($stone_photo->stone_id, $stone_photo->photo_id), array('class' => 'btn btn-default')) }}
    </div>

{{ Form::close() }}

@stop