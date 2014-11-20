<!doctype html>
<html>
	<head>
    	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href=" <?php echo asset('css/style.css')?>" type="text/css">
    	<style type="text/css">
    		form ul {list-style: none}
            .navbar {border-radius: 0px;}
    	</style>
    </head>

    <body>
    	<nav class="navbar navbar-inverse" role="navigation">
			<div class="container-fluid">
		    	<!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="#">Photo Gallery</a>
                </div>
		    	<div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
    		      		<li {{ (Request::is('stones') ? 'class="active"' : '') }}>{{ link_to_route('overview', 'Home') }}</li>
    		      		<li {{ (Request::is('stones/new_stone') ? 'class="active"' : '') }}>{{ link_to_route('new_stone', 'New Stone') }}</li>
    		      		<li {{ (Request::is('stones/new_photo') ? 'class="active"' : '') }}>{{ link_to_route('new_photo', 'Add photo') }}</li>
    		    	</ul>
    		  	</div>
            </div>
		</nav>

    	<div class="container">
    		@if (Session::has('message'))
            	<div class="flash alert">
            		<p>{{ Session::get('message') }}</p>
        		</div>
			@endif

    		@yield('content')
        </div>

        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	</body>

</html>