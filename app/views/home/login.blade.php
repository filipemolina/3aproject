@extends('layouts.main')

{{-- Zerar a navegação --}}

@section('navegacao') @stop

{{-- Conteúdo da página de Login --}}

@section('content')

	<div class="container">

		<div class="row">

			<div class="wrapper-login col-md-4">
			
				{{ Form::open(array('url' => '/login')) }}
			    
			        <h2 class="form-signin-heading">Login</h2>
			        
			        {{ Form::label('email', 'E-mail', array('class' => 'sr-only')) }}
			        {{ Form::text('email', '', array('class' => 'form-control', 'placeholder' => 'E-mail', 'required' => '', 'autofocus' => '')) }}

			        {{ Form::label('password', 'Senha', array('class' => 'sr-only')) }}
			        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Senha', 'required' => '')) }}

			        {{ Form::button('Entrar', array('class' => 'btn btn-lg btn-primary btn-block col-md-6', 'type' => 'submit')) }}
			    
			    {{ Form::close() }}
			
			</div>
		
		</div>

    </div> <!-- /container -->

@stop