<nav class="navbar navbar-inverse">

  	<div class="container-fluid">
  
	    <div class="navbar-header">
		    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		    </button>
		    <a class="navbar-brand" href="/">3A Worldwide</a>
	    </div>


    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Campanhas <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Clientes</a></li>
            <li><a href="#">Peças</a></li>
            <li><a href="#">Opções</a></li>
        </ul>

        <form class="navbar-form navbar-left" role="search">

            <div class="form-group">
                <input type="text" class="form-control" placeholder="Pesquisa">
            </div>

            <button type="submit" class="btn btn-default">Enviar</button>

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