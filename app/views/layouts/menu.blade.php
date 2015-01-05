<?php 

  //Determinar a foto do usuário, ou usar a foto padrão

    if(isset(Auth::user()->foto))
      $foto = asset(Auth::user()->foto);
    else
      $foto = asset("img/user.gif");

?>

<nav class="navbar navbar-inverse">

  	<div class="container-fluid">

    {{-- Ícone --}}
  
    <div class="navbar-header">
	    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	    </button>
	    <a class="navbar-brand" href="/">3A Worldwide</a>
    </div>
    
    {{-- Itens do Menu --}}

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          
        {{-- Menu da Esquerda --}}

        {{-- Aplicar a classe 'active' ao item do menu referente ao controller atual --}}

        <ul class="nav navbar-nav">
            <li @if(explode('@', Route::currentRouteAction())[0] == 'CampanhasController') class="active" @endif><a href="/campanhas">Campanhas</a></li>
            <li @if(explode('@', Route::currentRouteAction())[0] == 'EmpresasController')  class="active" @endif><a href="/empresas">Empresas</a></li>
            <li @if(explode('@', Route::currentRouteAction())[0] == 'PecasController')     class="active" @endif><a href="/pecas">Peças</a></li>
            <li @if(explode('@', Route::currentRouteAction())[0] == 'UsersController')     class="active" @endif><a href="/usuarios/opcoes">Opções</a></li>
        </ul>

        {{-- Formulário de Pesquisa --}}

        <form class="navbar-form navbar-left" role="search">

            <div class="form-group">
                <input type="text" class="form-control" placeholder="Pesquisa">
            </div>

            <button type="submit" class="btn btn-default">Enviar</button>

        </form>

        {{-- Menu da Direita --}}

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