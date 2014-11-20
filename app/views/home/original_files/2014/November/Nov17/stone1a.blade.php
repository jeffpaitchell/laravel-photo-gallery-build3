@section('content')
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <b>{{ $stone->stone_name . ' (id:' . $stone->stone_id . ')' }}</b><br />
            <b> {{ link_to_route('overview', 'Go Back To Stone List') }}   </b>
            <div class="pull-right">
                {{ Form::open(array('route' => array('delete_stone', $stone->stone_id))) }}
                    {{ link_to_route('edit_stone', 'Edit Stone', array('id' => $stone->stone_id), array('class' => 'btn btn-info')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete Stone', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </div>
        </div>
        <div class="panel-body">

            <div class="row">


            <div class ="table-responsive">    
            <table class="table">    

                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Colors</th>
                    <th>Origin</th>
                    <th>Pattern</th>
                    <th>Application/Description</th>
                </tr>    

                <tr>
                    <td>{{ $stone->stone_id }}</td>
                    <td>{{ $stone->stone_name }}</td>
                    <td>{{ $stone->stone_type }}</td>
                    <td><li>{{ $stone->stone_color_black}}</li>
                        <li>{{ $stone->stone_color_blue }}</li> 
                        <li>{{ $stone->stone_color_brown }}</li>
                        <li>{{ $stone->stone_color_gold }}</li>
                        <li>{{ $stone->stone_color_gray }}</li>
                        <li>{{ $stone->stone_color_green }}</li> 
                        <li>{{ $stone->stone_color_red }}</li> 
                        <li>{{ $stone->stone_color_white }}</li>
                    </td>
                    <td>{{ $stone->stone_origin }}</td>
                    <td>{{ $stone->stone_pattern }}</td>
                    <td>
                        <li>{{ $stone->stone_application_kitchen}}</li>
                        <li>{{ $stone->stone_application_bathroom }}</li> 
                        <li>{{ $stone->stone_application_fireplace }}</li>
                        <li>{{ $stone->stone_application_floor }}</li>
                        <li>{{ $stone->stone_application_outdoor }}</li>    
                    </td>    
                </tr>
            </table>
            </div>

            @if ($stonePhotos->count())   

            @foreach($stonePhotos as $photo)
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>{{ $photo->photo_name }}</b>
                            <b>{{ link_to_route('show_photo', 'Edit Photo', array($photo->stone_id, $photo->photo_id)) }}</b>
                            <b>{{ link_to_route('show_photo_full', 'View Photo', array($photo->stone_id, $photo->photo_id)) }}</b>
                        </div>
                        <div class="panel-body">
                            <img class="img" src='{{ asset("uploads/photos/" . $photo->photo_path ) }}' />
                        </div>
                    </div>
                </div>
    		@endforeach

            </div>
        </div>
        <div class="panel-footer clearfix">
    	   <?php echo $stonePhotos->links(); ?>
        </div>
    	@else
        	{{ ('No photos found.') }}
            </div>
    	@endif


    </div>
@stop