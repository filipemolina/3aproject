@extends('layouts.main')

@section('content')

	<div role="tabpanel">

		<!-- Abas -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#clientes" aria-controls="clientes" role="tab" data-toggle="tab">Clientes</a></li>
			<li role="presentation"><a href="#opcoes" aria-controls="opcoes" role="tab" data-toggle="tab">Opções</a></li>
		</ul>

		<!-- Painéis -->
		<div class="tab-content">

			{{--------------------- Lista de Campanhas e Peças ----------------------}}
			
			<div role="tabpanel" class="tab-pane active tab-campanhas" id="clientes">

				

			</div>

			{{--------------------- Aba de Opções do Usuário ----------------------}}

			<div role="tabpanel" class="tab-pane" id="opcoes">

				<div class="row">

					<div class="col-md-5 alterar-senha">

						<h2 class="alterar-senha">Alterar Senha</h2>
					
						{{ Form::open(array('url' => '/mudarsenha')) }}
						
							<div class="form-group">
								{{ Form::label('atual', 'Senha Atual') }}
								{{ Form::password('atual', array('class' => 'form-control', 'placeholder' => 'Senha Atual')) }}
							</div>

							<div class="form-group">
								{{ Form::label('nova', 'Nova Senha') }}
								{{ Form::password('nova', array('class' => 'form-control', 'placeholder' => 'Nova Senha')) }}
							</div>

							<div class="form-group">
								{{ Form::label('repetida', 'Repita a Senha') }}
								{{ Form::password('repetida', array('class' => 'form-control', 'placeholder' => 'Repita a senha')) }}
							</div>

							{{ Form::button('Enviar', array('class' => 'btn btn-primary', 'type' => 'submit')) }}
						
						{{ Form::close() }}
						
					</div>

					<div class="col-md-5 upload-foto">

						<h2 class="alterar-senha">Foto</h2>
					
						{{ Form::open(array('files' => true)) }}
						
							<div class="form-group">
								{{ Form::label('foto', 'Arquivo') }}
								{{ Form::file('foto') }}
							</div>

							{{ Form::button('Enviar', array('class' => 'btn btn-primary', 'type' => 'submit')) }}
						
						{{ Form::close() }}
						
					</div>

				</div>

			</div>

		</div>

	</div>

@stop