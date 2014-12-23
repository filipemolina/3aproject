<!DOCTYPE html>
<html>
<head>
	<title>Campanhas</title>

	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
</head>
<body>
		
	<!-- Navegação -->

	@section('navegacao')

		<nav class="navbar navbar-inverse">

		  	<div class="container-fluid">
		  
			    <div class="navbar-header">
				    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				    </button>
				    <a class="navbar-brand" href="#">Brand</a>
			    </div>


		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

		        <ul class="nav navbar-nav">
		            <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
		            <li><a href="#">Link</a></li>
		            <li class="dropdown">
		                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
		                <ul class="dropdown-menu" role="menu">
		                    <li><a href="#">Action</a></li>
		                    <li><a href="#">Another action</a></li>
		                    <li><a href="#">Something else here</a></li>
		                    <li class="divider"></li>
		                    <li><a href="#">Separated link</a></li>
		                    <li class="divider"></li>
		                    <li><a href="#">One more separated link</a></li>
		                </ul>
		            </li>
		        </ul>

		        <form class="navbar-form navbar-left" role="search">

		            <div class="form-group">
		                <input type="text" class="form-control" placeholder="Search">
		            </div>

		            <button type="submit" class="btn btn-default">Submit</button>

		        </form>

		        <ul class="nav navbar-nav navbar-right">
		            <li class="dropdown">
		              	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><img src="{{ $foto }}" alt="" class="imagem-usuario"> <span class="caret menu-usuario"></span></a>
		              	<ul class="dropdown-menu" role="menu">
		                	<li><a href="/logout">Logout</a></li>
		              	</ul>
		            </li>
		        </ul>

		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>

		@show

	<div class="container">
	
		@yield('content')

	</div>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>