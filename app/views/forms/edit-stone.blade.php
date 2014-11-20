@section('content')

{{ Form::model($stone, array('method' => 'PUT', 'route' => array('update_stone', $stone->stone_id))) }}

    <div class="form-group">
        {{ Form::label('stone_name', 'Stone Name: ') }}
        {{ Form::text('stone_name', null, $options = array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('stone_description', 'Stone Description' . ':') }}
        {{ Form::text('stone_description', null, $options = array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('stone_origin', 'Origin:') }}
        {{ Form::select('stone_origin', array('Africa' => 'Africa', 'Angola' => 'Angola', 'Argentina' => 'Argentina', 'Australia' => 'Australia', 'Austria' => 'Austria', 'Belgium' => 'Belgium', 'Braislien' => 'Braislien', 'Brazil' => 'Brazil', 'Bulgaria' => 'Bulgaria', 'Canada' => 'Canada', 'China' => 'China', 'Croatia' => 'Croatia', 'Cuba' => 'Cuba', 'Czech Republic' => 'Czech Republic', 'Egypt' => 'Egypt', 'Engineered' => 'Engineered', 'Ethiopia' => 'Ethiopia', 'Finland' => 'Finland', 'France' => 'France', 'Georgia' => 'Georgia', 'Germany' => 'Germany', 'Great Britain' => 'Great Britain', 'Greece' => 'Greece', 'Guatemala' => 'Guatemala', 'India' => 'India', 'Iran' => 'Iran', 'Ireland' => 'Ireland', 'Israel' => 'Israel', 'Italy' => 'Italy', 'Japan' => 'Japan', 'Kasahstan' => 'Kasahstan', 'Macedonia' => 'Macedonia', 'Madagascar' => 'Madagascar', 'Malaysia' => 'Malayasia', 'Mexico' => 'Mexico', 'Mongolia' => "Mongolia", 'Morocco' => 'Morocco', 'Mozambique' => 'Mozambique', 'Nambia' => 'Namibia', 'Nigeria' => 'Nigeria', 'Norway' => 'Norway', 'Other' => 'Other', 'Pakistan' => 'Pakistan', 'Peru' => 'Peru', 'Poland' => 'Poland', 'Portugal' => 'Portugal', 'Russia' => 'Russia', 'Saudi Arabia' => 'Saudi Arabia', 'Sweden' => 'Sweden', 'Switzerland' => 'Switzerland', 'Tunisia' => 'Tunisia', 'Turkey' => 'Turkey', 'Ukraine' => 'Ukraine', 'Uruguay' => 'Uruguay', 'USA' => 'USA', 'Venezuela' => 'Venezuela', 'Vietnam' => 'Vietnam', 'Yugoslavia' => 'Yugoslavia', 'Zambia' => 'Zambia', 'Zimbabwe' => 'Zimbabwe'), $stone->stone_origin) }}

        {{ Form::label('stone_pattern', 'Pattern:') }}
        {{ Form::select('stone_pattern', array('Veins' => 'Veins', 'Speckles' => 'Speckles', 'Solid Color' => 'Solid Color', ) ,array('class' => 'form-control')) }}
    
        {{ Form::label('stone_type', 'Type:') }}
        {{ Form::select('stone_type', array('Marble' => 'Marble', 'Granite' => 'Granite', 'Onyx' => 'Onyx', 'Limestone' => 'Limestone', 'Slate' => 'Slate', 'Quartzite' => 'Quartzite', 'Other' => 'Other', 'Soapstone' => 'Soapstone', 'Travertine' => 'Travertine', 'Caesar Stone' => 'Caesar Stone', 'Quartz Based Ceramic' => 'Quartz Based Ceramic', 'Gemstone' => 'Gemstone', 'Granite*' => 'Granite*', 'Marble*' => 'Marble*', 'Agglomerate' => 'Agglomerate', 'Glass' => 'Glass', 'Quantra' => 'Quantra', 'Santa Margherita' => 'Santa Margherita', 'Antolini Luigi' => 'Antolini Luigi', 'Marble.com' => 'Marble.com', 'Porcelain Tile' => 'Porcelain Tile', 'Onyx Tile' => 'Onyx Tile', 'Lava Stone Tile' => 'Lava Stone Tile'), $stone->stone_type) }}
    </div>

    <div class="form-group">
        <b>Application:</b><br />

        <div class ="form-group">

        <!-- Use code below for generating and retrieving checkboxes -->    

        {{ Form::checkbox('stone_application_kitchen', 'Kitchen') }}
        {{ Form::label('stone_application_kitchen', 'Kitchen') }}
        {{ Form::checkbox('stone_application_bathroom', 'Bathroom') }}
        {{ Form::label('stone_application_bathroom', 'Bathroom') }}<br />
        {{ Form::checkbox('stone_application_fireplace', 'Fireplace') }}
        {{ Form::label('stone_application_fireplace', 'Fireplace') }}
        {{ Form::checkbox('stone_application_floor', 'Floor') }}
        {{ Form::label('stone_application_floor', 'Floor') }}<br />
        {{ Form::checkbox('stone_application_outdoor', 'Outdoor') }}
        {{ Form::label('stone_application_outdoor', 'Outdoor') }}

        </div>

    </div>

    <div class="form-group">
        <b>Colors:</b><br />

        <div class ="form-group">

        <!-- Use code below for generating checkboxes -->    

        {{ Form::checkbox('stone_color_black', 'Black') }}
        {{ Form::label('stone_color_black', 'Black') }}
        {{ Form::checkbox('stone_color_blue', 'Blue') }}
        {{ Form::label('stone_color_blue', 'Blue') }}<br />
        {{ Form::checkbox('stone_color_brown', 'Brown') }}
        {{ Form::label('stone_color_brown', 'Brown') }}
        {{ Form::checkbox('stone_color_gold', 'Gold') }}
        {{ Form::label('stone_color_gold', 'Gold') }}<br />
        {{ Form::checkbox('stone_color_gray', 'Gray') }}
        {{ Form::label('stone_color_gray', 'Gray') }}
        {{ Form::checkbox('stone_color_green', 'Green') }}
        {{ Form::label('stone_color_green', 'Green') }}<br />
        {{ Form::checkbox('stone_color_red', 'Red') }}
        {{ Form::label('stone_color_red', 'Red') }}
        {{ Form::checkbox('stone_color_white', 'White') }}
        {{ Form::label('stone_color_white', 'White') }}<br />        

        </div>

    </div>

    <div class="form-group">
        {{ Form::label('stone_othername', 'Other Names' . ':') }}
        {{ Form::text('stone_othername', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        <b>Technical Information:</b><br />

        <div class="col-md-2">
            {{ Form::label('stone_absorption', 'Absorption (%)' . ':') }}
            {{ Form::text('stone_absorption', null, array('class' => 'form-control')) }}                
        </div>

        <div class="col-md-2">
            {{ Form::label('stone_density', 'Density (kg/m3)' . ':') }}
            {{ Form::text('stone_density', null, array('class' => 'form-control')) }}                
        </div>

        <div class="col-md-2">
            {{ Form::label('stone_compression', 'Compression(MPa)' . ':') }}
            {{ Form::text('stone_compression', null, array('class' => 'form-control')) }}                
        </div>

        <div class="col-md-2">
            {{ Form::label('stone_abrasion', 'Abrasion (g/m2)' . ':') }}
            {{ Form::text('stone_abrasion', null, array('class' => 'form-control')) }}                
        </div>

        <div class="col-md-2">
            {{ Form::label('stone_flex', 'Flex (MPa)' . ':') }}
            {{ Form::text('stone_flex', null, array('class' => 'form-control')) }}                
        </div>    

    </div>
 

    <div class="form-group">
        {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
        {{ link_to_route('show_stone', 'Cancel', array($stone->stone_id), array('class' => 'btn btn-default')) }}
    </div>

{{ Form::close() }}

@stop