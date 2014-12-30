@extends('layouts.main')

@section('content')

	<div role="tabpanel">

		<!-- Abas -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#campanhas" aria-controls="campanhas" role="tab" data-toggle="tab">Campanhas</a></li>
			<li role="presentation"><a href="#cadastro" aria-controls="cadastro" role="tab" data-toggle="tab">Cadastro</a></li>
			<li role="presentation"><a href="#opcoes" aria-controls="opcoes" role="tab" data-toggle="tab">Opções</a></li>
		</ul>

		<!-- Painéis -->
		<div class="tab-content">

			{{--------------------- Lista de Campanhas ----------------------}}
			
			<div role="tabpanel" class="tab-pane active tab-campanhas" id="campanhas">

				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

				<?php $i = 0; ?>

				@forelse($empresas as $empresa)

				  <div class="panel panel-default">

				  	{{-- Botão --}}

				    <div class="panel-heading" role="tab" id=" {{ 'empresa'.$i }} ">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#{{ 'collapse'.$i }}" aria-expanded="true" aria-controls="{{ 'collapse'.$i }}">
				          {{ $empresa->razao_social }}
				        </a>
				      </h4>
				    </div>

				    {{-- Conteúdo --}}

				    <div id="{{ 'collapse'.$i }}" class="panel-collapse collapse @if($i == 0) in @endif" role="tabpanel" aria-labelledby="{{ 'empresa'.$i }}">
				      <div class="panel-body">
				        
					      	<table class="table table-striped">
								<thead>
									<tr>
										<th>Nome</th>
										<th>Data de Criação</th>
									</tr>
								</thead>
								<tbody>

									{{-- Iterar pelas peças da campanha --}}
									
									@forelse($empresa->campanhas as $campanha)

										<tr>
											<td> {{ $campanha->nome }} </td>
											<td> {{ $campanha->created_at }} </td>
										</tr>

									@empty
										
										<tr>
											<td colspan="2">Nenhum item encontrado</td>
										<!-- </tr> -->

									@endforelse

								</tbody>
							</table>

							<button class="btn btn-primary">Criar Nova Campanha</button>

				      </div>
				    </div>
				  </div>

				 <?php $i++; ?>

				@empty

					<h2>Nenhuma empresa cadastrada</h2>

				@endforelse

				</div>

			</div>

			{{-------------------- Aba de Cadastro de novas campanhas --------------------}}

			<div role="tabpanel" class="tab-pane" id="cadastro">
				
				{{ Form::open(array('url' => '/campanhas', 'class' => 'col-md-6 col-md-offset-3')) }}

					<div class="form-group">
						{{ Form::label('nome', 'Nome:') }}
						{{ Form::text('nome', '', array('class' => 'form-control', 'placeholder' => 'Nome')) }}
					</div>
					<div class="form-group col-md-6 row">
						{{ Form::label('data_inicial', 'Data Inicial: ') }}
						{{ Form::text('data_inicial', '', array('class' => 'form-control data', 'placeholder' => 'Data Inicial')) }}
					</div>
					<div class="form-group col-md-6 col-md-offset-1 row">
						{{ Form::label('data_final', 'Data Final: ') }}
						{{ Form::text('data_final', '', array('class' => 'form-control data', 'placeholder' => 'Data Final')) }}
					</div>
					<div class="form-group col-md-6 row">
						{{ Form::label('empresa_id', 'Empresa: ') }}
						{{ Form::select('empresa_id', $lista_empresas, '', array('class' => 'form-control')) }}
					</div>

					<div class="form-group row col-md-12">
						{{ Form::button('Enviar', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
					</div>

				{{ Form::close() }}

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