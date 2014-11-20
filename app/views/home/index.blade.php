@section('content')

	<div class="row">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <b>{{ 'Stones Overview' }}</b>
            </div>
            <div class="panel-body">
                @if ($allStones->count())
                    <dl class="dl-horizontal">
                        <!-- Add this div class to make the table responsive -->
                        <div class = "table-responsive">
                            <table class="table">
                                <b>Results: </b> {{ $totalStones->count() }}<br>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Colors</th>
                                    <th>Origin</th>
                                    <th>Pattern</th>
                                    <th>Application/Description</th>
                                    <th>Active</th>
                                </tr>        
                		@foreach($allStones as $stone)
                        <tr>
                			 <td>{{ $stone->stone_id }}</b></td>
                			 <td>{{ $stone->stone_name }}</td>
                             <td>{{ $stone->stone_type }}</td>
                             <td>
                                <li>{{ $stone->stone_color_black}}</li>
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
                             <td><b>{{ link_to_route('show_stone', 'Edit', array($stone->stone_id)) }}</b></td>
                        </tr>     
                        @endforeach
                        {{ $allStones-> links()}}
                            </table>
                        </div>    


                    </dl>
            	@else
                	<b>{{ 'No stones found.' }}</b>
            	@endif
            </div>
        </div>
    </div>
    
@stop