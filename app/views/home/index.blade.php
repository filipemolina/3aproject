@extends('layouts.main')

@section('content')

	<div role="tabpanel">

		<!-- Abas -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#campanhas" aria-controls="campanhas" role="tab" data-toggle="tab">Campanhas</a></li>
			<li role="presentation"><a href="#opcoes" aria-controls="opcoes" role="tab" data-toggle="tab">Opções</a></li>
		</ul>

		<!-- Painéis -->
		<div class="tab-content">

			{{--------------------- Lista de Campanhas e Peças ----------------------}}
			
			<div role="tabpanel" class="tab-pane active tab-campanhas" id="campanhas">

				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

				<?php $i = 0; ?>

				@forelse($campanhas as $campanha)

				  <div class="panel panel-default">
				    <div class="panel-heading" role="tab" id=" {{ 'campanha'.$i }} ">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#{{ 'collapse'.$i }}" aria-expanded="true" aria-controls="{{ 'collapse'.$i }}">
				          {{ $campanha->nome }}
				        </a>
				      </h4>
				    </div>
				    <div id="{{ 'collapse'.$i }}" class="panel-collapse collapse @if($i == 0) in @endif" role="tabpanel" aria-labelledby="{{ 'campanha'.$i }}">
				      <div class="panel-body">
				        
					      	<table class="table table-striped">
								<thead>
									<tr>
										<th>Tipo</th>
										<th>Título</th>
										<th>Aprovado</th>
										<th>Anotações</th>
										<th>Arquivo</th>
									</tr>
								</thead>
								<tbody>

									{{-- Iterar pelas peças da campanha --}}
									
									@forelse($campanha->pecas as $peca)

										<tr>
											<td> {{ $peca->tipo->descricao }} </td>
											<td> {{ $peca->titulo }} </td>
											<td> <label>{{ Form::checkbox('aprovado', $peca->aprovado) }}</label> </td>
											<td> <a href="javascript:void(0)">Escrever</a> </td>
											<td> <a href="{{ $peca->arquivo }}" class="btn btn-primary">Download</a> </td>
										</tr>

									@empty
										
										<tr>
											<td colspan="3">Nenhum item encontrado</td>
										</tr>

									@endforelse

								</tbody>
							</table>

				      </div>
				    </div>
				  </div>

				 <?php $i++; ?>

				@empty

					<h2>Nenhuma campanha encontrada</h2>

				@endforelse

				</div>

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