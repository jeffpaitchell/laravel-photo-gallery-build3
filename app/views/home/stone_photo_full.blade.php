@section('content')

<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <b>{{ $stone_photo->photo_name }}</b>
            <div class="pull-right">
                <a class="btn btn-default" href="{{ URL::route('show_stone', array('id' => $stone_photo->stone_id)) }}">{{ 'Return to Stone.' }}</a>
            </div>
        </div>
        <div class="full-photo-size">
            <img class="img" src='{{ asset("uploads/photos/" . $stone_photo->photo_path ) }}' />
        </div>
        <div class="panel-footer clearfix">
    	    {{ $stone_photo->photo_description }}
            {{ Form::open(array('route' => array('delete_photo', $stone_photo->stone_id, $stone_photo->photo_id))) }}
                    {{ link_to_route('edit_photo', 'Edit', array('stoneId' => $stone_photo->stone_id, 'photoId' => $stone_photo->photo_id), array('class' => 'btn btn-info')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
        </div>
    </div>
</div>
	
@stop